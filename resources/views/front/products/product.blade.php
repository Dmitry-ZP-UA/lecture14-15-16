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


        <form action=" {{ route('product.comment', $product->slug) }}" method="post">
            @csrf
            <div class="d-flex">
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Name</label>
                    <input type="text" name="name" class="form-control" id="exampleInputPassword1" placeholder="Name">
                </div>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Your comments</label>
                <input type="text" name="text" class="form-control" id="exampleInputPassword1">
                <input type="hidden" name="product_id" value="{{ $product->id }}">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

        @foreach($comments as $comment)

            <div class="card" style="margin-bottom: 90px; margin-top: 20px">
                <div class="card-header">
                    {{ $comment->name }}
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{ $comment->email }}</h5>
                    <p class="card-text">{{ $comment->text }}</p>
                    <a href="#" class="btn btn-primary">Reply</a>
                </div>
            </div>
        @endforeach



    @endsection

