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
    <table class="table table-striped table-hover table-responsive">
        <thead class="thead-dark">
        <tr>
            <th scope="col">imagePath</th>
            <th scope="col">title</th>
            <th scope="col">discount_price</th>

        </tr>
        </thead>
        <tbody>
        @foreach($products as $product)
            <tr>
                <tid{{ $product['imagePath'] }}></tid>
                <td>{{ $product['title'] }}</td>
                <td>{{ $product['discount_price'] }}</td>
                <td><a class="btn btn-primary pull-right btn-success" href="{{ route('product.addToCart',['id' => $product->id] ) }}" role="button">Kjøp</a></td>

            </tr>
        @endforeach
        </tbody>
    </table>

@endsection