@extends('admin.layouts.admin')
@section('title')
    Admin Create Product
@endsection
@section('content')
    <div class="container">
        <h1>Create a Product</h1>
        <form action="{{ route('admin.products.store') }}" method="post">
            {{ csrf_field() }}

            <div class="form-group row">
                <label for="imagePath" class="col-sm-2 col-form-label col-form-label-lg">ImagePath</label>
                <input type="text" class="form-control" name="imagePath" id="imagePath" placeholder="Dette må være en url">
            </div>
            <div class="form-group row">
                <label for="title" class="col-sm-2 col-form-label col-form-label-lg">Title</label>
                <input type="text" class="form-control form-control-lg" name="title" id="title" placeholder="Navnet på modellen">
            </div>
            <div class="form-group row">
                <label for="description" class="col-sm-2 col-form-label col-form-label-lg">Description</label>
                <input type="text" class="form-control" name="description" id="description" placeholder="En kort beskrivelse av produktet">
            </div>
            <div class="form-group row">
                <label for="pris" class="col-sm-2 col-form-label col-form-label-lg">Pris</label>
                <input type="text" class="form-control" name="pris" id="pris" placeholder="Pris">
            </div>
            <div class="form-group row">
                <div class="col-md-2"></div>
                <button type="submit" class="btn btn-primary">Create</button>
            </div>
        </form>
    </div>
@endsection