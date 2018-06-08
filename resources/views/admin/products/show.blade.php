@extends('admin.layouts.admin')

@section('title')
    Admin Show Product
@endsection

@section('content')
    {{--TODO: Jobbe med layout og design av det--}}
    <h1>Showing {{ $product->title }}</h1>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <strong>Description:</strong> {{ $product['description'] }}<br>
                <strong>Pris</strong> {{ $product['pris'] }}
            </div>
            <div class="col-md-6">
                <img src="{{ $product['imagePath'] }}" class="img-responsive" style="max-height: 100px; max-width: 100px" >
            </div>
        </div>
    </div>
@endsection