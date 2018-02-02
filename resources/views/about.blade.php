@extends('layouts.main')
@section('content')
    <div class="fh5co-slider">
        <div class="container">
            <img src="{{ asset('/storage/slider/about/default.jpg') }}" class="img-responsive">
        </div>
    </div>
    <!-- Slider -->
    <div id="fh5co-intro" class="fh5co-section">
        <div class="container">
            <div class="row row-bottom-padded-sm">
                <div class="col-md-8 col-md-offset-2 text-center ts-intro">
                    <h1>{{ $about->title }}</h1>
                    <p class="fh5co-lead">{{$about->excerpt}}</p>
                </div>
            </div>
            <div class="row row-bottom-padded-sm">
                <div class="col-md-8" id="fh5co-content">
                    {!! $about->body !!}
                </div>
                <div class="col-md-4" id="fh5co-sidebar">
                    <div class="fh5co-service text-left">
                        <img src="{{asset('/storage/'.$about->image)}}" class="img-responsive img-bordered">
                        <h3>Советуем посмотреть</h3>
                        <p>Наши лучшие работы:</p>
                        <ul class="ul_style_1">
                        @foreach($bestWorks as $work)
                                <li><a href="{{ '/portfolio/' . $work->id }}">{{ $work->title }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            @include('partials.important')
        </div>
    </div>
@endsection