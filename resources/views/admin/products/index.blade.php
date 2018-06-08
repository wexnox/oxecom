
@extends('admin.layouts.admin')

@section('title')
    Admin index
@endsection

@section('content')

    <!-- will be used to show any messages -->
    @if (\Session::has('message'))
        <div class="alert alert-info">{{ \Session::get('message') }}</div>
    @endif
    <table class="table table-striped table-hover table-responsive">
        <thead class="thead-dark">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">ImagePath</th>
            <th scope="col">Title</th>
            <th scope="col">Description</th>
            <th scope="col">Pris</th>
            <th scope="col" colspan="3">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($products as $product)
            <tr>
                <td scope="row">{{ $product['id'] }}</td>
                <a href="">
                <td>
                    <img src="{{ $product['imagePath'] }}" class="img-responsive" style="max-height: 100px; max-width: 100px" alt="">
                </td>
                <td>{{ $product['title'] }}</td>
                <td>{{ $product['description'] }}</td>
                <td>{{ $product['pris'] }}</td>
                <td><a class="btn btn-small btn-success" href="{{ URL::to('admin/products/' . $product['id']) }}">View</a></td>
                <td><a class="btn btn-warning" href="{{ action('Product\AdminController@edit', $product['id'] )}}">Edit</a></td>
                <td>
                    <form action="{{ action('Product\AdminController@destroy', $product['id']) }}" method="post">
                        {{csrf_field()}}
                        <input name="_method" type="hidden" value="DELETE">
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection