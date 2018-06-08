@extends('admin.layouts.admin')
@section('title')
    Admin Edit Product
@endsection
@section('content')
    <div class="container">
        <h1>Edit {{ $product->title }}</h1>
        <div class="row">
            <form method="post" action="{{ action('ProductController@update', $id) }}" >
                <input name="_method" type="hidden" value="PATCH">
                <div class="form-group">
                    {{ csrf_field() }}
                    {{--{{ method_field('PATCH') }}--}}

                    <label for="imagePath" class="">ImagePath</label>
                    <input type="text" class="form-control" name="imagePath" id="imagePath" value="{{ $product->imagePath }}">
                </div>
                <div class="form-group">
                    <label for="title" class="">Title</label>
                    <input type="text" class="form-control" name="title" id="title" value="{{ $product->title }}">
                </div>
                <div class="form-group">
                    <label for="description" class="">Description</label>
                    <input type="text" class="form-control" name="description" id="description" value="{{ $product->description }}">
                </div>
                <div class="form-group">
                    <label for="pris" class="">Pris</label>
                    <input type="text" class="form-control" name="pris" id="pris" value="{{ $product->pris }}">
                </div>
                <div class="form-group ">
                    <div class="col-md-2"></div>
                    <button type="reset" class="btn btn-dark">Reset</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection