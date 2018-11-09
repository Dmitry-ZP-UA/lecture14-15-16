@extends('layouts.front.app')

@section('og')
    <meta property="og:type" content="product"/>
    <meta property="og:title" content="{{ $product->name }}"/>
    <meta property="og:description" content="{{ strip_tags($product->description) }}"/>

@endsection

@section('content')
    <div class="container product">
        <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li><a href="{{ route('home') }}"> <i class="fa fa-home"></i> Home</a></li>
                    @if(isset($category))
                        <li><a href="{{ route('front.category.slug', $category->slug) }}">{{ $category->name }}</a></li>
                    @endif
                    <li class="active">Product</li>
                </ol>
            </div>
        </div>
        @include('layouts.front.product')

        <form action=" {{ route('front.get.product', $product->slug) }}" method="post" id="sort">
            @csrf
            <select name="sort" form="sort">
                <option value="likes_counter">likes up</option>
                <option value="created_at">date up</option>
            </select>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

        @include('layouts.front.comments')
    @endsection

