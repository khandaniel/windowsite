@extends('layouts.main')
@section('content')
    <div class="fh5co-slider">
        <div class="container">
            <img src="/images/slider_2.jpg" alt="Free HTML5 Website Template" class="img-responsive">
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
                    @include('partials.category')
                @endforeach
            </div>
            @include('partials.important')
        </div>
    </div>
@endsection