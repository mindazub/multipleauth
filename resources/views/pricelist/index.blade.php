@extends('layouts.app')

@section('content')


    <div class="container">

        <h1>Price List for </h1>


        <div class="form-group">


            <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                <div class="btn-group" role="group">
                    <button id="btnGroupDrop1" type="button" class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Download
                    </button>
                    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                        <a href="{{ URL::to('admin/downloadExcel/xls') }}"><button class="btn btn-success">Download Excel xls</button></a>
                        <a href="{{ URL::to('admin/downloadExcel/xlsx') }}"><button class="btn btn-success">Download Excel xlsx</button></a>
                        <a href="{{ URL::to('admin/downloadExcel/csv') }}"><button class="btn btn-success">Download CSV</button></a>
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
                        {{--<a class="dropdown-item" href="#">*.csv</a>--}}

                        <form
                            action="{{ URL::to('admin/importExcel') }}" class="form-horizontal" method="post" enctype="multipart/form-data" >
                            <br><br>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="file" name="import_file" />
                            <br>
                            <button class="btn btn-primary">Import File</button>
                        </form>


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
                <th>DISCOUNTED </th>
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
                    <td>
                        @if($product->title)
                            <span class="badge">OK</span>
                        @endif
                    </td>
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
                    <td> {{ $product->price }} </td>
                    <td><img width="50" src="{{ Storage::url($product->picture_one) }}" alt="picture_one"></td>
                    <td><img width="50" src="{{ Storage::url($product->picture_two) }}" alt="picture_two"></td>
                    <td><img width="50" src="{{ Storage::url($product->picture_three) }}" alt="picture_three"></td>
                    <td> {{ $product->qty }}</td>
                    <td>

                        <a href="{{ route('product.show', [$product->id]) }}"
                           style="color: green;">
                            <i class="fas fa-eye">&nbspShow</i>
                        </a>


                        <br>

                        <form action="{{ route('product.destroy', [$product->id]) }}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('delete') }}
                            <input class="btn btn-sm btn-danger" type="submit"
                                   style="background-color: red; -webkit-border-radius: ;-moz-border-radius: ;border-radius: 20px;" value="x">


                        </form>
                    </td>
                    @endforeach


                </tr>
        </table>

        {{ $products->links() }}

    </div>

@endsection
