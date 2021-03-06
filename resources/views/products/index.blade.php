@extends('layouts.app')

@section('title')
    Laravel Shopping Cart
@endsection

@section('content')

    <!-- will be used to show any messages -->
    @if (\Session::has('message'))
        <div class="alert alert-info">{{ \Session::get('message') }}</div>
    @endif
    {{--TODO: styling--}}
    <div class="container">
        <div class="row">
            @if(count($items) >= 0)
                <table class="table table-hover table-responsive">

                    <thead>
                    <tr>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Storage</th>
                        <th>Price</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($items as $item)

                        @foreach($item->product as $product)
                            <tr>
                                <td><img id="showProduct" class="img-responsive" src="{{ $product->imagePath }}" alt="{{ $product->title }}"></td>
                                <td>{{ $product->title }}</td>
                                <td>{{ $product->description }}</td>
                                @if(is_bool($product->in_stock) <= 1)
                                    {{--TODO: ordne check--}}
                                    <td>In stock{{ $product->status }}</td>
                                @else
                                    <td>Out of stock</td>
                                @endif
                                <td>Kr {{ $product->discount_price }},- <span class="text-small">Kr {{ $product->original_price }},-</span></td>
                                <td><a class="btn btn-primary pull-right btn-success" href="{{ route('product.addToCart',['id' => $product->id] ) }}" role="button">Kjøp</a></td>
                            </tr>
                        @endforeach

                    @endforeach
                    </tbody>

                </table>
            @else

                <h6>No products in storage</h6>

            @endif
        </div>
    </div>
@endsection