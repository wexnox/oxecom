<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();

// User profile
Route::group(['middleware' => 'auth'], function(){
    Route::get('/profile', 'HomeController@index')->name('profile');
});

//// User index
Route::get('/', [
        'uses' => 'Product\ClientController@getIndex',
        'as' => 'product.index']
);

Route::name('menu')->get('menu/{category}/{id}', 'Product\ClientController@index');


Route::get('products/{id}',[
    'uses' => 'Product\ClientController@show',
    'as' => 'product.show'
]);

//// User Cart
Route::get('/add-to-cart/{id}',[
    'uses' => 'Product\ClientController@getAddToCart',
    'as' => 'product.addToCart'
]);

Route::get('/reduce/{id}',[
    'uses' => 'Product\ClientController@getReduceByOne',
    'as'=> 'product.reduceByOne'
]);

Route::get('/remove/{id}', [
    'uses' => 'Product\ClientController@getRemoveItem',
    'as' => 'product.remove'
]);

Route::get('/shopping-cart',[
    'uses' => 'Product\ClientController@getCart',
    'as' => 'product.shoppingCart'
]);
Route::get('/checkout',[
    'uses' => 'Product\ClientController@getCheckout',
    'as' => 'checkout',
    'middleware' =>'auth'
]);
Route::post('/checkout',[
    'uses' => 'Product\ClientController@postCheckout',
    'as' => 'checkout',
    'middleware' =>'auth'
]);

//// Admin Crud
//// TODO: Setup group middleware. Auth
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'auth'], function (){
    Route::resource('products', 'Product\AdminController');
    Route::resource('categories', 'Categories\AdminController');
});
