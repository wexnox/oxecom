@extends('admin.layouts.admin')
@section('title')
    Admin Edit Product
@endsection
@section('content')
    <div class="container">
        <h1>Edit {{ $category->name }}</h1>
        <div class="row">
            <form method="post" action="{{ action('ProductController@edit', $id) }}" >
                <input name="_method" type="hidden" value="PATCH">
                <div class="form-group">
                    {{ csrf_field() }}
                    {{--{{ method_field('PATCH') }}--}}

                    <label for="imagePath" class="">ID:</label>
                    <input type="text" class="form-control" name="id" id="id" value="{{ $category->id }}">
                </div>
                <div class="form-group">
                    <label for="title" class="">Name</label>
                    <input type="text" class="form-control" Name="name" id="name" value="{{ $category->name }}">
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