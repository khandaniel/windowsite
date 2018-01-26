@extends('layouts.main')
@section('content')
    <div id="fh5co-intro" class="fh5co-section">
        <div class="container">
            @include('partials.articles_title')
            <div class="row row-bottom-padded-sm">
                <div class="col-md-8 col-md-push-4" id="fh5co-content">
                    <h2>{{$article->title}}</h2>
                    {!! $article->text !!}
                </div>
                <div class="col-md-4 col-md-pull-8" id="fh5co-sidebar">
                    <div class="fh5co-service text-left">
                        <img src="/images/slider_2.jpg" class="img-responsive img-bordered" alt="Free HTML5 Bootstrap Template by FreeHTML5.co">
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


        </div>
    </div>
@endsection