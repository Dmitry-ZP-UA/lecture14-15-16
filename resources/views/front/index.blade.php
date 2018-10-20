@extends('layouts.front.app')

@section('og')
    <meta property="og:type" content="home"/>
    <meta property="og:title" content="{{ config('app.name') }}"/>
    <meta property="og:description" content="{{ config('app.name') }}"/>
@endsection

@section('content')
    <div class="container">
        @foreach($categories as $category)
            <section class="new-product t100 home">
                <h2 class="text-center">{{ $category->name }}</h2>
                @foreach($category->images as $image)
                    <img src="{{ asset($image->src) }}" width="400" alt="">
                @endforeach
                @foreach($category->subCategories as $subCategory)
                    <div class="section-title b50">
                        <h3 class="text-center">{{ $subCategory->name }}</h3>
                    </div>
                    @if ($subCategory->images->count() > 0)
                        @foreach($subCategory->images as $image)
                            <img src="{{ $image->src }}" alt="" class="img-responsive">
                        @endforeach
                    @else
                        <img src="https://placehold.it/400x200" alt="placeholder image" class="img-responsive" />
                    @endif
                    <div id="browse-all-btn">
                        <a class="btn btn-default browse-all-btn" href="{{ route('front.category.slug', $subCategory->slug) }}"
                           role="button">browse all items
                        </a>
                    </div>
                @endforeach
            </section>
        @endforeach
    </div>
@endsection