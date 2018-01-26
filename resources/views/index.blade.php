@extends('layouts.main')
@section('content')
    <div class="fh5co-slider">
        <div class="container">
            <div class="owl-carousel owl-carousel-main">
                @foreach(array_diff(scandir('storage/slider'), ['.', '..']) as $filename)
                    <div><img src="storage/slider/{{$filename}}" alt="Picture"></div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Slider -->

    <div id="fh5co-intro" class="fh5co-section">
        <div class="container">
            <div class="row row-bottom-padded-md">
                <div class="col-md-8 col-md-offset-2 text-center ts-intro">
                    <h1>{{$main->title}}</h1>
                    <p class="fh5co-lead">{{ $main->excerpt }}</p>
                </div>
            </div>
            <div class="row row-bottom-padded-sm">
                <div class="col-md-4">
                    <div class="fh5co-service text-center">
                        <span class="fh5co-service-icon fh5co-icon-pentagon"><i class="icon-tools-2"></i></span>
                        <h3>Tools We Use</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur ullam unde, totam harum laboriosam dolores.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="fh5co-service text-center">
                        <span class="fh5co-service-icon fh5co-icon-pentagon"><i class="icon-trophy22"></i></span>
                        <h3>Award Winning Company</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur ullam unde, totam harum laboriosam dolores.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="fh5co-service text-center">
                        <span class="fh5co-service-icon fh5co-icon-pentagon"><i class="icon-profile-male"></i></span>
                        <h3>24/7 Customer Support</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur ullam unde, totam harum laboriosam dolores.</p>
                    </div>
                </div>
            </div>
            <div class="row row-bottom-padded-sm">
                <div class="col-md-6">
                    <p><img src="images/slider_1.jpg" alt="Free HTML5 Bootstrap Template" class="img-responsive img-bordered"></p>
                </div>
                <div class="col-md-6 padded-top">
                    <h3>Creative Title Here</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum fuga rerum doloremque dolore, molestias eligendi. Nulla aliquam aut doloribus tenetur repellendus omnis dicta, unde magni.</p>
                    <ul class="ul_style_1">
                        <li>Lorem ipsum dolor sit amet</li>
                        <li>Consectetur adipisicing elit</li>
                        <li>Recusandae laboriosam eligendi maiores</li>
                        <li>Sapiente repudiandae perspiciatis</li>
                    </ul>
                </div>
            </div>

            <div class="row row-bottom-padded-sm">
                <div class="col-md-4">
                    <div class="fh5co-service text-center">
                        <img src="images/slider_1.jpg" class="img-responsive img-bordered" alt="Free HTML5 Bootstrap Template by FreeHTML5.co">
                        <h3>Graphic Design</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur ullam unde, totam harum laboriosam dolores.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="fh5co-service text-center">
                        <img src="images/slider_2.jpg" class="img-responsive img-bordered" alt="Free HTML5 Bootstrap Template by FreeHTML5.co">
                        <h3>Web Design</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur ullam unde, totam harum laboriosam dolores.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="fh5co-service text-center">
                        <img src="images/slider_3.jpg" class="img-responsive img-bordered" alt="Free HTML5 Bootstrap Template by FreeHTML5.co">
                        <h3>Web Development</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur ullam unde, totam harum laboriosam dolores.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection