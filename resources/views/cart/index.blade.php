@extends('layouts.front')

@section('content')

    <div class="container">

        <div class="row">
                @if(Session::has('cart'))
                    <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">

                        <ul class="list-group">
                            @foreach($products as $product)
                                <li class="list-group-item">
                                    <span class="badge badge-pill badge-success">
                                        {{ $product['qty'] }}
                                    </span>
                                    <strong>{{ $product['item']['title'] }}</strong>
                                    <span class="label label-success">{{ $product['price'] }}</span>
                                    <div class="btn-group">
                                        <button class="btn btn-primary btn-xs dropdown-toggle"
                                        data-toggle="dropdown">
                                            Action <span class="caret"></span></button>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="#">Reduce by 1</a>
                                                <a href="#">Reduce All</a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                @endforeach
                        </ul>

                    </div>
        </div>

        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <strong> Total: {{ $totalPrice }}</strong>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <a href="{{ route('front.checkout') }}" type="btn btn-success" class="btn btn-success">
                    Checkout
                </a>
            </div>
        </div>
                @else
            <div class="row">
                <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                    <h2>No items in the cart</h2>
                </div>
            </div>


                @endif

    </div>


@endsection
