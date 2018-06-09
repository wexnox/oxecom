@extends('layouts.app')

@section('title')
    {{ $product->title }}
@endsection

@section('content')
    {{--TODO: styling--}}
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Showing {{ $product->title }}</h1>
            </div>
            <div class="col-md-4">
                <img id="showProduct" src="{{ $product['imagePath'] }}" class="img-responsive">
            </div>
            <div class="col-md-4">
                <strong>Description:</strong> {{ $product['description'] }}
                <div>
                    <h4><strong>Pris</strong> {{ $product->discount_price }} <span> {{ $product->original_price }} </span></h4>
                    <a class="btn btn-primary pull-right btn-success" href="{{ route('product.addToCart',['id' => $product->id] ) }}" role="button">Kjøp</a>
                </div>
            </div>
        </div>
    </div>
@endsection