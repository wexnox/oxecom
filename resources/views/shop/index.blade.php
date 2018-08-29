@extends('layouts.app')
@section('title')
    Laravel Shopping Cart
@endsection
@section('content')
    @if(Session::has('success'))
        <div class="row">
            <div class="col-sm-6 col-md-4 col-md-offset-4 col-sm-offset-3">
                <div id="charge-message" class="alert alert-success">
                    {{ Session::get('success') }}
                </div>
            </div>
        </div>
    @endif
    @foreach($products->chunk(3) as $productChunk)
        <div class="row">
            @foreach($productChunk as $product)
                <div class="col-sm-6 col-md-4">
                    <div class="card">
                        <a href="{{ route('product.show', $product->id) }}">
                            <img class="card-img-top" src="{{ $product->imagePath }}"  alt="Image of {{ $product->title }}">
                        </a>
                        <div class="card-body">
                            <a href="{{ route('product.show', $product->id) }}">
                                <h3 class="card-title">{{ $product->title }}</h3>
                            </a>
                            <p class="card-text">{{ $product->description }}.</p>
                            <p class="card-text"><small class="text-muted">Lagerstatus:</small></p>
                            <div class="clearfix">
                                <div class="pull-left price">{{ $product->original_price }},- </div>
                                <a class="btn btn-primary pull-right btn-success" href="{{ route('product.addToCart',['id' => $product->id] ) }}" role="button">Kjøp</a>
                            </div>
                        </div>

                    </div>
                    <br>
                </div>
            @endforeach
        </div>
    @endforeach

    {{--NOTE: hot_products--}}

    <div class="container">
        <h3>Hot Offers</h3>
        @foreach($hot_products as $hot_product)
            <div class="col-sm-6 col-md-4">
                <div class="card">

                    <a href="{{ route('product.show',$hot_product->id) }}">
                        <img title=" " alt=" " src="{{ $hot_product->imagePath }}" alt="Image of {{ $hot_product->title }}">
                    </a>
                    <div class="card-body">
                        <p>{!! $hot_product->title !!}</p>
                        <h4>{{ $hot_product->discount_price }},- <span>{{ $hot_product->original_price }},-</span></h4>
                        <div class="clearfix">
                            <a class="btn btn-primary pull-right btn-success" href="{{ route('product.addToCart',$hot_product->id) }}">Add to Cart</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    {{--Note: top_products--}}
    <div class="top-brands">
        <div class="container">
            <h3>Top Products</h3>
            <div class="agile_top_brands_grids">
                @foreach($top_products  as $top_product)
                    <div class="col-md-3 top_brand_left">
                        <div class="hover14 column">
                            <div class="agile_top_brand_left_grid">
                                <div class="agile_top_brand_left_grid1">
                                    <figure>
                                        <div class="snipcart-item block" >
                                            <div class="snipcart-thumb">
                                                <a href="{{ route('product.show',$hot_product->id) }}">
                                                    <img width="150" height="150" title="{{ $top_product->title }}" alt="{{ $top_product->title }}" src="{{ $top_product->imagePath }}" />
                                                </a>
                                                <p>{{ $top_product->title }}</p>
                                                <h4>{{ $top_product->discount_price }},- <span>{{ $top_product->original_price }},-</span></h4>
                                            </div>
                                            <div class="snipcart-details top_brand_home_details">
                                                <a class="btn btn-primary pull-right btn-success" href="{{ route('product.addToCart',$hot_product->id) }}">Add to Cart</a>
                                            </div>
                                        </div>
                                    </figure>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>
@endsection