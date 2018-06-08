<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Auth::user()->orders;
        $orders->transform(function ($order, $key){
            $order->cart =unserialize($order->cart);
            return $order;
        });
        return view('user.profile', ['orders' => $orders]); // NOTE: Det var return view('home');
    }

}
