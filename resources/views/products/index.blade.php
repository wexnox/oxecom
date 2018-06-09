@extends('layouts.app')

@section('title')
    Laravel Shopping Cart
@endsection

@section('content')

    <!-- will be used to show any messages -->
    @if (\Session::has('message'))
        <div class="alert alert-info">{{ \Session::get('message') }}</div>
    @endif

    {{--Todo: Table layout....... bytte om til Card!!!--}}
    <div class="col-md-11">
    {{--<table class="table table-striped table-hover table-responsive">--}}
        <table class="table table-striped table-hover">
        <thead class="thead-dark">
        <tr>
            <th scope="col">imagePath</th>
            <th scope="col">title</th>
            <th scope="col">discount_price</th>
            <th></th>

        </tr>
        </thead>
        <tbody>

        @foreach($categories as $product)

            <tr>
                <td><img id="showProduct" src="{{ $product['imagePath'] }}" alt="{{ $product['title'] }}"></td>
                <td>{{ $product['title'] }}</td>
                <td>{{ $product['discount_price'] }}</td>
                <td><a class="btn btn-primary pull-right btn-success" href="{{ route('product.addToCart',['id' => $product->id] ) }}" role="button">Kjøp</a></td>

            </tr>
        @endforeach
        </tbody>
    </table>
    </div>
@endsection