@extends('layouts.app')

@section('content')


    <div class="container">

    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Product View: {{ $product->title }}
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <table class="table">
                            <tr>
                                <td>{{ __('SKU') }}:</td>
                                <td>{{ $product->sku }}</td>
                            </tr>
                            <tr>
                                <td>{{ __('Title') }}:</td>
                                <td>{{ $product->title }}</td>
                            </tr>
                            <tr>
                                <td>{{ __('Slug') }}:</td>
                                <td>{{ $product->slug }}</td>
                            </tr>
                            <tr>
                                <td>
                                    {{ __('Categories') }}
                                </td>

                                <td>
                                    @foreach($product->categories as $cat)
                                        <span class="badge">{{ $cat->title }}</span><br>
                                    @endforeach
                                </td>

                            </tr>
                            <tr>
                                <td>{{ __('Short Description') }}:</td>
                                <td>{{ $product->shortDescription }}</td>
                            </tr>
                            <tr>
                                <td>{{ __('Description') }}:</td>
                                <td>{{ $product->description }}</td>
                            </tr>
                            <tr>
                                <td>{{ __('Retail Price') }}:</td>
                                <td>{{ $product->retailPrice }}</td>
                            </tr>
                            <tr>
                                <td>{{ __('Wholesale Price') }}:</td>
                                <td>{{ $product->wholeSalePrice }}</td>
                            </tr>
                            <tr>
                                <td>{{ __('Picture 1') }}:</td>
                                <td><img width="100" src="{{ Storage::url($product->picture_one) }}"></td>
                            </tr>
                            <tr>
                                <td>{{ __('Picture 2') }}:</td>
                                <td><img width="100" src="{{ Storage::url($product->picture_two) }}"></td>
                            </tr>
                            <tr>
                                <td>{{ __('Picture 3') }}:</td>
                                <td><img width="100" src="{{ Storage::url($product->picture_three) }}"></td>
                            </tr>
                            <tr>
                                <td>{{ __('QTY') }}:</td>
                                <td>{{ $product->qty }}</td>
                            </tr>
                            <tr>
                                <td>{{ __('Created') }}:</td>
                                <td>{{ $product->created_at }}</td>
                            </tr>
                        </table>

                        <a class="btn btn-secondary" href="javascript:history.back();">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>






@endsection
