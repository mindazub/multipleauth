@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="jumbotron">
            <h1 class="display-4">Products</h1>
            <p class="lead">
                <a class="btn btn-primary btn-lg" href="{{ url('/admin/product') }}" role="button">Learn more</a>
            </p>
        </div>
    </div>

    <div class="container">
        <div class="jumbotron">
            <h1 class="display-4">Categories</h1>
            <p class="lead">
                <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
            </p>
        </div>
    </div>

    <div class="container">
        <div class="jumbotron">
            <h1 class="display-4">API</h1>
            <p class="lead">
                <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
            </p>
        </div>
    </div>

    <div class="container">
        <div class="jumbotron">
            <h1 class="display-4">Cart</h1>
        </div>
    </div>

@endsection