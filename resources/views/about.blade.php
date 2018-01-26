@extends('layouts.main')
@section('content')
    <div class="fh5co-slider">
        <div class="container">
            <img src="images/slider_3.jpg" alt="Free HTML5 Website Template" class="img-responsive">
        </div>
    </div>
    <!-- Slider -->
    <div id="fh5co-intro" class="fh5co-section">
        <div class="container">
            <div class="row row-bottom-padded-sm">
                <div class="col-md-8 col-md-offset-2 text-center ts-intro">
                    <h1>{{$about->title}}</h1>
                    <p class="fh5co-lead">{{$about->excerpt}}</p>
                </div>
            </div>
            <div class="row row-bottom-padded-sm">
                <div class="col-md-8" id="fh5co-content">
                    {!! $about->body !!}
                </div>
                <div class="col-md-4" id="fh5co-sidebar">
                    <div class="fh5co-service text-left">
                        <img src="images/slider_2.jpg" class="img-responsive img-bordered" alt="Free HTML5 Bootstrap Template by FreeHTML5.co">
                        <h3>Web Design</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur ullam unde, totam harum laboriosam dolores.</p>
                        <ul class="ul_style_1">
                            <li>Lorem ipsum dolor sit amet</li>
                            <li>Consectetur adipisicing elit</li>
                            <li>Recusandae laboriosam eligendi maiores</li>
                            <li>Sapiente repudiandae perspiciatis</li>
                        </ul>
                    </div>
                </div>
            </div>
            @include('partials.important')
        </div>
    </div>
@endsection