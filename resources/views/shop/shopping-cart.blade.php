@extends ('layouts.app')

@section('title')
    Handlekurv
@endsection
@section('content')
    {{-- TODO: må legge til clear shopping cart--}}
    {{-- TODO: Må legge til funksjonalitet for fjerning enkelte av varer--}}
    @if(Session::has('cart'))
        <div class="row">
            <div class="col-sm-6 col-md6 col-md-offset-3 col-sm-offset-3">
                <ul class="list-group">
                    @foreach($products as $product)
                        <li class="list-group-item">
                            <span class="badge">{{ $product['qty'] }}</span>
                            <strong>{{$product['item']['title'] }}</strong>
                            <span class="label label-success">{{ $product['pris'] }}</span>
                            <div class="btn-group">
                                <button class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown">Action </button>
                                <ul class="dropdown-menu">
                                    <li><a href="{{ route('product.reduceByOne', ['id' => $product['item']['id']]) }}">Ta bort 1</a></li>
                                    <li><a href="{{ route('product.remove', ['id' => $product['item']['id']]) }}">Ta bort alle</a></li>
                                </ul>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 col-md6 col-md-offset-3 col-sm-offset-3">
                <strong>Total {{ $totalPris }}</strong>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-6 col-md6 col-md-offset-3 col-sm-offset-3">
                <a href="{{ route('checkout') }}" type="button" class="btn btn-success">Checkout</a>
            </div>
        </div>
    @else
        <div class="row">
            <div class="col-sm-6 col-md6 col-md-offset-3 col-sm-offset-3">
                <h2>No items in cart!</h2>
            </div>
        </div>
    @endif

@endsection
