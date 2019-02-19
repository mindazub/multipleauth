@extends('layouts.front')

@section('content')

    <div class="container">

        <div class="row">

            <div class="col-lg-3">

                <h1 class="my-4">Shop Name</h1>
                <div class="list-group">

                    @foreach($categories as $cat)

                        <a href="{{ route('front.category.products', [$cat->slug]) }}"
                           class="list-group-item">{{ $cat->title }}</a>

                    @endforeach

                    <a href="#" class="list-group-item">+&nbsp&nbsp&nbspMore Items</a>
                </div>

            </div>
            <!-- /.col-lg-3 -->

            <div class="col-lg-9">

                {{--<h1 class="my-4">Search Bar and Filters</h1>--}}

                <div id="search-bar">

                </div>

                <div class="card mt-4">
                    {{--<img class="card-img-top img-fluid" src="http://placehold.it/900x400" alt="">--}}
                    <img class="img-fluid" style="height: 25rem; width: 25rem;   display: block; margin-left: auto; margin-right: auto;" src="{{ Storage::url($product->picture_one) }}" alt="picture_one">

                    <div class="card-body">
                        <h3 class="card-title">{{ $product->title }}</h3>
                        <h4>Wholesale price: ${{ $product->wholeSalePrice }}</h4>
                        <h4>Retail price: ${{ $product->retailPrice }}</h4>
                        <p>
                            <button class="btn btn-success">Add to Cart</button>
                        </p>
                        <p class="card-text">
                            {{ $product->description }}
                        </p>

                    </div>
                </div>
                <!-- /.card -->

                {{--<div class="card card-outline-secondary my-4">--}}
                    {{--<div class="card-header">--}}
                        {{--Product Reviews  --}}
                    {{--</div>--}}
                    {{--<div class="card-body">--}}
                        {{--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis et enim aperiam inventore, similique necessitatibus neque non! Doloribus, modi sapiente laboriosam aperiam fugiat laborum. Sequi mollitia, necessitatibus quae sint natus.</p>--}}
                        {{--<small class="text-muted">Posted by Anonymous on 3/1/17</small>--}}
                        {{--<hr>--}}
                        {{--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis et enim aperiam inventore, similique necessitatibus neque non! Doloribus, modi sapiente laboriosam aperiam fugiat laborum. Sequi mollitia, necessitatibus quae sint natus.</p>--}}
                        {{--<small class="text-muted">Posted by Anonymous on 3/1/17</small>--}}
                        {{--<hr>--}}
                        {{--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis et enim aperiam inventore, similique necessitatibus neque non! Doloribus, modi sapiente laboriosam aperiam fugiat laborum. Sequi mollitia, necessitatibus quae sint natus.</p>--}}
                        {{--<small class="text-muted">Posted by Anonymous on 3/1/17</small>--}}
                        {{--<hr>--}}
                        {{--<a href="#" class="btn btn-success">Leave a Review</a>--}}
                    {{--</div>--}}
                {{--</div>--}}
                <!-- /.card -->

            </div>
            <!-- /.col-lg-9 -->

        </div>

    </div>
    <!-- /.container -->

@endsection