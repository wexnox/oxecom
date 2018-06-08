@extends('layouts.app')

@section('title')
    Brukerprofil
@endsection

@section('content')

    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <h1>Bruker Profil</h1>
            <hr>
            <h2>My Orders</h2>
            @foreach($orders as $order)
                <div class="panel panel-default">
                    <div class="panel-body">
                        <ul class="list-group">
                            @foreach($order->cart->items as $item)
                                <li class="list-group-item">
                                    <span class="badge">Kr {{ $item['pris'] }}</span>
                                    {{ $item['item']['title'] }} | {{ $item['qty'] }} Units
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="panel-footer">
                        <strong>Total Price: Kr{{ $order->cart->totalPris }}</strong>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection