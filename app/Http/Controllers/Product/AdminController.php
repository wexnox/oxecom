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
//use Session;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // get all the products
        $products = Product::all();

        // load the view and pass the products
        return view('admin/products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // load the create form (app/views/products/create.blade.php)
        return view('admin/products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        NOTE:: Usikker på denne if statementen
//        if ($request->hasFile('imagePath')){
//            $file = $request->file('imagePath');
//            $name = time().$file->getClientOriginalName();
//            $file->move(public_path().'/images', $name);
//        }

    $validator = Validator::make($request->all(), [
        'imagePath'     => 'required|url',
        'title'         => 'required',
        'description'   => 'required',
        'pris'          => 'required'
    ]);
        // TODO: Feil melding vises ikke
        if ($validator->fails()) {
            return redirect('admin/products/create')
                ->withErrors($validator)
                ->withInput();
        }
        // store
        $product = new Product([
            'imagePath'     => $request->get('imagePath'),
            'title'         => $request->get('title'),
            'description'   => $request->get('description'),
            'pris'          => $request->get('pris')
        ]);

        $product->save();

        // redirect + successfull response
        Session::flash('message', 'Successfully created product!');
        return redirect('admin/products');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // get the product
        $product = Product::findOrFail($id);

        //show the view and pass the product to it
        return View('admin/products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // get the product
        $product = Product::findOrFail($id);

        //show the edit form and pass the product
        return view('admin/products.edit', compact('product', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // store
        $product = Product::findOrFail($id);
        $product->imagePath     = $request->get('imagePath');
        $product->title         = $request->get('title');
        $product->description   = $request->get('description');
        $product->pris          = $request->get('pris');
        $product->save();

        // redirect
        Session::flash('message', 'Successfully updated products!');
        return redirect('admin/products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // delete
        $product = Product::findOrFail($id);
        $product->delete();

        // redirect
        Session::flash('message', 'Successfully deleted the Product!');
        return redirect('admin/products');
    }
}
