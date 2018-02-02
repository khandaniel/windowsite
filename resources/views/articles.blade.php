@extends('layouts.main')
@section('content')
    <div class="fh5co-slider">
        <div class="container">
            <img src="{{ asset('/storage/slider/articles/default.jpg') }}">
        </div>
    </div>
    <!-- Slider -->

    <div id="fh5co-intro" class="fh5co-section">
        <div class="container">
            <div class="row row-bottom-padded-md">
                <div class="col-md-8 col-md-offset-2 text-center ts-intro">
                    <h1>{{ $articles_desc->title }}</h1>
                    <p class="fh5co-lead">{{ $articles_desc->excerpt }}</p>
                </div>
            </div>
            <div class="row row-bottom-padded-sm">
                @foreach($categories as $category)
                    @include('partials.category_badge')
                @endforeach
            </div>
            @include('partials.important')
        </div>
    </div>
@endsection