@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-lg-3">

                <h1 class="my-4">Admin Area</h1>
                <div class="list-group">
                    <a href="#" class="list-group-item">Category 1</a>
                    <a href="#" class="list-group-item">Category 2</a>
                    <a href="#" class="list-group-item">Category 3</a>
                    <a href="#" class="list-group-item">Category 4</a>
                    <a href="#" class="list-group-item">Category 5</a>
                    <a href="#" class="list-group-item">Category 6</a>
                    <a href="#" class="list-group-item">Category 7</a>
                    <a href="#" class="list-group-item">Category 8</a>
                    <a href="#" class="list-group-item">Category 9</a>
                    <a href="#" class="list-group-item">+&nbsp&nbsp&nbspMore Items</a>
                </div>

            </div>
            <!-- /.col-lg-3 -->

            <div class="col-lg-9">

                <h1 class="my-4">Search Bar and Filters</h1>

                @include('partials.table')

        </div>
        <!-- /.row -->

    </div>
@endsection