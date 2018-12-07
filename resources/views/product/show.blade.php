@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Product Create
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form action="{{ route('product.update', [$product->id]) }}" method="post" enctype="multipart/form-data">

                            {{ method_field('put') }}

                            {{ csrf_field() }}

                            <div class="form-group">
                                <label for="sku">{{ __('SKU') }}:</label>
                                <input id="sku" class="form-control" type="text" name="sku" value="{{ old('sku', $product->sku ) }}">
                                @if($errors->has('sku'))
                                    <div class="alert-danger">{{ $errors->first('sku') }}</div>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="qty">{{ __('qty') }}:</label>
                                <input id="qty" class="form-control" type="number" min="0" name="qty" value="{{ old('qty', $product->qty ) }}">
                                @if($errors->has('qty'))
                                    <div class="alert-danger">{{ $errors->first('qty') }}</div>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="title">{{ __('Title') }}:</label>
                                <input id="title" class="form-control" type="text" name="title" value="{{old('title', $product->title )}}">
                                @if($errors->has('title'))
                                    <div class="alert-danger">{{ $errors->first('title') }}</div>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="slug">{{ __('Slug') }}:</label>
                                <input id="slug" class="form-control" type="text" name="slug" value="{{ old('slug', $product->slug) }}">
                                @if($errors->has('slug'))
                                    <div class="alert-danger">{{ $errors->first('slug') }}</div>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="category_id">{{ __('Categories') }}:</label>

                                @foreach($categories as $category)
                                    <input name="categories[]" type="checkbox" value="{{ $category->id }}" {{ ($category->id == old('category_id')) ? 'selected' : '' }}>
                                        {{ $category->title }}
                                    </input>
                                @endforeach


                                {{--<select id="category_id" name="category_id" class="form-control">--}}
                                {{--<option value="">Choose a Category</option>--}}
                                {{--@foreach($categories as $category)--}}
                                {{--<option value="{{ $category->id }}" {{ ($category->id == old('category_id')) ? 'selected' : '' }}>--}}
                                {{--{{ $category->title }}--}}
                                {{--</option>--}}
                                {{--@endforeach--}}
                                {{--</select>--}}

                                @if($errors->has('category_id'))
                                    <div class="alert-danger">{{ $errors->first('category_id') }}</div>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="shortDescription">{{ __('Short Description') }}:</label>
                                <textarea id="shortDescription" class="form-control" rows="2" name="shortDescription">
                                    {{ old('shortDescription', $product->shortDescription ) }}
                                </textarea>
                                @if($errors->has('shortDescription'))
                                    <div class="alert-danger">{{ $errors->first('shortDescription') }}</div>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="description">{{ __('Description') }}:</label>
                                <textarea id="description" class="form-control" rows="5" name="description">
                                    {{ old('description', $product->description ) }}
                                </textarea>
                                @if($errors->has('description'))
                                    <div class="alert-danger">{{ $errors->first('description') }}</div>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="retailPrice">{{ __('Retail Price') }}:</label>
                                <input id="retailPrice" class="form-control" type="text" name="retailPrice" value="{{ old('retailPrice', $product->retailPrice) }}">
                                @if($errors->has('retailPrice'))
                                    <div class="alert-danger">{{ $errors->first('retailPrice') }}</div>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="wholeSalePrice">{{ __('WholeSale Price') }}:</label>
                                <input id="wholeSalePrice" class="form-control" type="text" name="wholeSalePrice" value="{{ old('wholeSalePrice', $product->wholeSalePrice ) }}">
                                @if($errors->has('wholeSalePrice'))
                                    <div class="alert-danger">{{ $errors->first('wholeSalePrice') }}</div>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="picture_one">{{ __('Picture 1') }}</label>
                                <input id="picture_one" class="form-control" type="file" name="picture_one" accept=".jpg, .jpeg, .png">
                                @if($errors->has('picture_one'))
                                    <div class="alert-danger">{{ $errors->first('picture_one') }}</div>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="picture_two">{{ __('Picture 2') }}</label>
                                <input id="picture_two" class="form-control" type="file" name="picture_two" accept=".jpg, .jpeg, .png">
                                @if($errors->has('picture_two'))
                                    <div class="alert-danger">{{ $errors->first('picture_two') }}</div>
                                @endif
                            </div>


                            <div class="form-group">
                                <label for="picture_three">{{ __('Picture 3') }}</label>
                                <input id="picture_three" class="form-control" type="file" name="picture_three" accept=".jpg, .jpeg, .png">
                                @if($errors->has('picture_three'))
                                    <div class="alert-danger">{{ $errors->first('picture_three') }}</div>
                                @endif
                            </div>

                            <div class="form-group">
                                <input class="btn btn-success" type="submit" value="{{ __('Update') }}">
                            </div>


                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>





@endsection
