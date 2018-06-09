<?php

namespace App\Http\Controllers\Product;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Stripe\Charge;
use Stripe\Stripe;
use Validator;
use App\Cart;
use App\Product;
use App\Order;
use Auth;
use Illuminate\Support\Facades\Session;
use View;
use App\Models\HotProduct;
use App\Models\TopProduct;
use App\Category;
use App\Models\SubCategories; // TODO: Må legge til subCategories

class ClientController extends Controller
{
    /** Shopping Cart **/

    public function getIndex(){
        $products = Product::all();
        $categories = Category::all();
        $subCategories = SubCategories::all();

        $hot_products = HotProduct::join('products','products.id','=','product_id')->get();
        $top_products = TopProduct::join('products','products.id','=','product_id')->get();
        return view('shop.index')
            ->with('hot_products',$hot_products)
            ->with('top_products',$top_products)
            ->with(['products' => $products])
            ->with(['categories' => $categories])
            ->with(['subCategories' => $subCategories]);

//        return view('shop.index',['products' => $products]);
    }


    public function show($id)
    {
        // get the product
        $product = Product::findOrFail($id);
        $categories = Category::all();
        $subCategories = SubCategories::all();

        //show the view and pass the product to it
        return View('products.show')
            ->with('product', $product)
            ->with('categories', $categories)
            ->with('subCategories', $subCategories);
    }
    public function getAddToCart(Request $request, $id){
        $product = Product::findOrFail($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);

        $request->session()->put('cart', $cart);
        //dd($request->session()->get('cart'));
        return redirect()->route('product.index');
    }

    public function getReduceByOne($id){
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->reduceByOne($id);

        if (count ($cart->items) >0 ){
            Session::put('cart', $cart);
        } else{
            Session::forget('cart');
        }

        return redirect()->route('product.shoppingCart');
    }

    public function getRemoveItem($id){
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);

        if (count ($cart->items) >0 ){
            Session::put('cart', $cart);
        } else{
            Session::forget('cart');
        }

        return redirect()->route('product.shoppingCart');
    }

    public function getCart(){
        if (!session::has('cart')){
            return view('shop.shopping-cart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view('shop.shopping-cart', ['products' => $cart->items, 'totalPris' => $cart->totalPris]);
    }

//     (Route::get) henter total summen av cart
    public function getCheckout(){
        if (!session::has('cart')){
            return view('shop.shopping-cart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $total = $cart->totalPris;
        return view('shop.checkout', ['total' => $total]);
    }

    //Stripe betaling

    public function postCheckout(Request $request){
        if (!Session::has('cart')){
            return redirect()->route('shop.shopping-cart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);

        Stripe::setApiKey("sk_test_MrslyqQJmMdewtvbysC41uMy");

        try {
            $charge = Charge::create(array(
                'amount' => $cart->totalPris * 100,
                'currency' => 'usd',
                'source' => $request->input('stripeToken'),
                'description' => 'Example charge',
            ));
            $order = new Order();
            $order->cart = serialize($cart);
            $order->address = $request->input('address');
            $order->name = $request->input('name');
            $order->payment_id = $charge->id;

            Auth::user()->orders()->save($order);
        } catch (\Exception $e){
            return redirect()->route('checkout')->with('error', $e->getMessage());
        }
        Session::forget('cart');
        return redirect()->route('product.index')->with('success', 'Successfully purchased products');
    }
}
