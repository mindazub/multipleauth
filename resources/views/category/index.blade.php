@extends('layouts.app')

@section('content')


    <div class="container">


        <div class="form-group">
            <h1>Categories</h1>
            <a class="btn btn-sm btn-primary" href="{{ route('category.create') }}">{{ __('New') }}</a>
            &nbsp&nbsp&nbsp
            <a class="btn btn-sm btn-success" href="#">{{ __('Download') }}</a>
            &nbsp&nbsp&nbsp
            <a class="btn btn-sm btn-success" href="#">{{ __('Upload') }}</a>

            {{--<form class="navbar-form navbar-right" action="#">--}}
                {{--<div class="form-group">--}}
                    {{--<input type="text" class="form-control" name="category" placeholder="Search for categories ...">--}}


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
