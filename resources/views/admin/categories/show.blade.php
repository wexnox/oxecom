@extends('admin.layouts.admin')

@section('title')
    Admin Show Category
@endsection

@section('content')
    {{--TODO: Jobbe med layout og design av det--}}
    <h1>Showing {{ $category['name'] }}</h1>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <strong>ID:</strong> {{ $category['id'] }}<br>
                <strong>Name</strong> {{ $category['name'] }}
            </div>

        </div>
    </div>
@endsection