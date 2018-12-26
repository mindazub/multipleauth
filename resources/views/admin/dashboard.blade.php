@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="jumbotron">
            <h1 class="display-4">Products&nbsp
                <span class="badge badge-pill badge-success">{{ $productBadge }}</span>
            </h1>
            <p class="lead">
                <a class="btn btn-primary btn-lg" href="{{ url('/admin/product') }}" role="button">Learn more</a>
            </p>
        </div>
    </div>

    <div class="container">
        <div class="jumbotron">
            <h1 class="display-4">Categories
                <span class="badge badge-pill badge-success">{{ $categoryBadge }}</span>
            </h1>
            <p class="lead">
                <a class="btn btn-primary btn-lg" href="{{ url('/admin/category') }}" role="button">Learn more</a>
            </p>
        </div>
    </div>

    <div class="container">
        <div class="jumbotron">
            <h1 class="display-4">Roles
                <span class="badge badge-pill badge-success">{{ $roleBadge }}</span>
            </h1>
            <p class="lead">
                <a class="btn btn-primary btn-lg" href="{{ url('/admin/role') }}" role="button">Learn more</a>
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