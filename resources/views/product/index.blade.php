@extends('layouts.app')

@section('content')


    <div class="container">

        <h1>Products</h1>


        <div class="form-group">
            <a class="btn btn-sm btn-success" href="{{ route('product.create') }}">{{ __('New') }}</a>
            {{--&nbsp&nbsp&nbsp--}}
            {{--<a class="btn btn-sm btn-success" href="#">{{ __('Download') }}</a>--}}
            {{--&nbsp&nbsp&nbsp--}}
            {{--<a class="btn btn-sm btn-success" href="#">{{ __('Upload') }}</a>--}}

            <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                <div class="btn-group" role="group">
                    <button id="btnGroupDrop1" type="button" class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Download
                    </button>
                    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                        <a class="dropdown-item" href="#">*.xlsx</a>
                        <a class="dropdown-item" href="#">*.csv</a>
                    </div>
                </div>
            </div>

            <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                <div class="btn-group" role="group">
                    <button id="btnGroupDrop1" type="button" class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Upload
                    </button>
                    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                        {{--<a class="dropdown-item" href="#">*.xlsx</a>--}}
                        <a class="dropdown-item" href="#">*.csv</a>
                    </div>
                </div>
            </div>
            {{--<form class="navbar-form navbar-right" action="#">--}}
                {{--<div class="form-group">--}}
                    {{--<input type="text" class="form-control" placeholder="Search for products ...">--}}
                {{--</div>--}}
                {{--<button type="submit" class="btn btn-default">--}}
                    {{--<span class="glyphicon glyphicon-search" aria-hidden="true"></span>--}}
                    {{--Search--}}
                {{--</button>--}}
            {{--</form>--}}
        </div>

        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger" role="alert">
                {{ session('error') }}
            </div>
        @endif


        <table class="table">
            <tr>
                <th>ID</th>
                <th>sku</th>
                <th>Title</th>
                <th>Slug</th>
                <th>Category</th>
                <th>Short</th>
                <th>Descr</th>
                <th>Retail </th>
                <th>Wholesale </th>
                <th>Pic 1</th>
                <th>Pic 2</th>
                <th>Pic 3</th>
                <th>Qty</th>
                <th>Actions</th>
            </tr>


            @foreach($products as $product)
                <tr>
                    <td> {{ $product->id }}</td>
                    <td> {{ $product->sku }}</td>
                    <td> {{ $product->title }} </td>
                    <td>
                        @if($product->slug)
                            <span class="badge">OK</span>
                        @endif
                    </td>

                    <td>
                        @foreach($product->categories as $cat)
                            <span class="badge">{{ $cat->title }}</span><br>
                        @endforeach
                    </td>

                    {{--<td> {{ str_limit($product->shortDescription, $limit = 50, $end = '...') }} </td>--}}
                    {{--<td> {{ str_limit($product->description, $limit = 50, $end = '...') }} </td>--}}
                    <td>
                        @if($product->shortDescription)
                            <span class="badge">OK</span>
                        @endif
                    </td>
                    <td>
                        @if($product->description)
                            <span class="badge">OK</span>
                        @endif
                    </td>
                    <td> {{ $product->retailPrice }} </td>
                    <td> {{ $product->wholeSalePrice }} </td>
                    <td><img width="50" src="{{ Storage::url($product->picture_one) }}" alt="picture_one"></td>
                    <td><img width="50" src="{{ Storage::url($product->picture_two) }}" alt="picture_two"></td>
                    <td><img width="50" src="{{ Storage::url($product->picture_three) }}" alt="picture_three"></td>
                    <td> {{ $product->qty }}</td>
                    <td>
                        <a class="btn btn-sm btn-info" href="{{ route('product.show', [$product->id]) }}">{{ __('View') }}</a>
                        <a class="btn btn-sm btn-success" href="{{ route('product.edit', [$product->id]) }}">{{ __('Edit') }}</a>
                        <form action="{{ route('product.destroy', [$product->id]) }}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('delete') }}
                            <input class="btn btn-sm btn-danger" type="submit" value="Delete">
                        </form>
                    </td>
                    @endforeach


                </tr>
        </table>

        {{ $products->links() }}

    </div>

@endsection
