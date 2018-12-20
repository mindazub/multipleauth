@extends('layouts.app')

@section('content')


    <div class="container">
        <h1>Categories</h1>

        <div class="form-group">
            <a class="btn btn-sm btn-success" href="{{ route('category.create') }}">{{ __('New') }}</a>
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

        <table class="table">
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Slug</th>
                <th>Products Count</th>
                <th>Actions</th>
            </tr>


            @foreach($categories as $category)
                <tr>
                    <td> {{ $category->id }}</td>
                    <td> {{ $category->title }} </td>
                    <td>{{ $category->slug }}</td>
                    <td>
                        {{ $category->products()->count() }}
                        {{--<i class="glyphicon glyphicon-ok-sign success"></i>--}}
                        {{--<i class="glyphicon glyphicon-remove-sign danger"></i>--}}
                    </td>
                    <td>
                        {{--<a class="btn btn-sm btn-info" href="{{ route('category.show', [$category->id]) }}">{{ __('View') }}</a>--}}
                        <a class="btn btn-sm btn-success" href="{{ route('category.edit', [$category->id]) }}">{{ __('Edit') }}</a>
                        <form action="{{ route('category.destroy', [$category->id]) }}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('delete') }}
                            <input onclick="return confirm('Delete confirm?');" class="btn btn-sm btn-danger" type="submit" value="Delete">
                        </form>
                    </td>
                </tr>
            @endforeach



        </table>

        {{ $categories->links() }}

    </div>

@endsection
