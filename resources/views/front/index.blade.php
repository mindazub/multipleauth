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

                    @if($categories->count() > 20)
                        <a href="#" class="list-group-item">+&nbsp&nbsp&nbspMore Items</a>
                    @else
                    @endif

                </div>

            </div>
            <!-- /.col-lg-3 -->

            <div class="col-lg-9">

                {{--<h1 class="my-4">Search Bar and Filters</h1>--}}
                
                <div id="search-bar">

                </div>


                {{--START OF CAROUSEL --}}
                {{--END OF CAROUSEL --}}


                <div class="row">

                    @foreach($products as $product)

                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card h-100">

                                {{--<img class="card-img-top" src="{{ $product->picture_one }}" alt="">--}}
                                <img width="200"
                                     style="padding-left: 35px;"
                                     src="{{ Storage::url($product->picture_one) }}"
                                     alt="picture_one">

                                </a>
                                <div class="card-body">
                                    <h4 class="card-title">
                                        <a href="{{ route('front.show', [$product->id]) }}">
                                            {{ $product->title }}
                                        </a>
                                    </h4>


                                    {{--CHECK THIS OUT!--}}

                                    @guest
                                        <h5>Retail: ${{ $product->retailPrice }}</h5>
                                    @endguest

                                    @auth
                                        <h5>Retail: ${{ $product->retailPrice }}</h5>
                                        <h5>Wholesale: ${{ $product->wholeSalePrice }}</h5>
                                    @endauth

                                    {{--END OF THIS--}}



                                    @if($product->qty)
                                        <p style="font-size: 20px;">
                                            In stock: <span class="badge badge-success">{{ $product->qty }}</span>
                                        </p>
                                    @else
                                        <p style="font-size: 20px;">
                                            <span class="badge badge-danger">Out of stock</span>
                                        </p>
                                    @endif
                                    <p class="card-text">
                                        {{--{{ $product->shortDescription }}--}}
                                    </p>
                                </div>
                                <div class="card-footer">
                                    <a class="btn btn-success pull-right" href="{{ route('front.addToCart', ['id' => $product->id]) }}">Add to Cart</a>
                                </div>
                            </div>
                        </div>

                    @endforeach


                </div>
                <!-- /.row -->

                {{--<ul class="pagination justify-content-center">--}}
                {{--<li class="page-item"><a class="page-link" href="#">Previous</a></li>--}}
                {{--<li class="page-item"><a class="page-link" href="#">1</a></li>--}}
                {{--<li class="page-item active"><a class="page-link" href="#">2</a></li>--}}
                {{--<li class="page-item"><a class="page-link" href="#">3</a></li>--}}
                {{--<li class="page-item"><a class="page-link" href="#">Next</a></li>--}}
                {{--</ul>--}}

                {{ $products->links() }}

            </div>
            <!-- /.col-lg-9 -->

        </div>
        <!-- /.row -->

    </div>


@endsection
