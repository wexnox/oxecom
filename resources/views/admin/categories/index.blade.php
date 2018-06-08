
@extends('admin.layouts.admin')

@section('title')
    Admin Category index
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
            <th scope="col">Name</th>
            <th scope="col" colspan="3">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($categories as $category)
            <tr>
                <td scope="row">{{ $category['id'] }}</td>
                <td>{{ $category['name'] }}</td>
                <td><a class="btn btn-small btn-success" href="{{ url('/admin/categories/' . $category['id']) }}">View</a></td>
                <td><a class="btn btn-warning" href="{{ action('CategoryController@edit', $category['id'] )}}">Edit</a></td>
                <td>
                    <form action="{{ action('CategoryController@destroy', $category['id']) }}" method="post">
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
