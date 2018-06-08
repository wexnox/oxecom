@extends('admin.layouts.admin')
@section('title')
    Admin Create Category
@endsection
@section('content')
    <div class="container">
        <h1>Create a Category</h1>
        <form action="{{ route('admin.categories.store') }}" method="post">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="name" class="col-sm-2 col-form-label col-form-label-lg">Navn</label>
                <input type="text" class="form-control form-control-lg" name="name" id="name" placeholder="Her kan du skrive navnet på kategorien du vil legge til">
            </div>
            <div class="form-group">
                <div class="col-md-2"></div>
                <button type="submit" class="btn btn-primary">Create</button>
            </div>
        </form>
    </div>
@endsection