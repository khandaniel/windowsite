@extends('layouts.main')
@section('content')
    <div class="fh5co-slider">
        <div class="container">
            <div class="owl-carousel owl-carousel-main">
                @foreach(array_diff(scandir('storage/slider/index'), ['.', '..']) as $filename)
                    <div><img src="{{ asset('storage/slider/index/'.$filename) }}" alt="Picture"></div>
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
                        <h3>Обслуживание</h3>
                        <p>Всегда готовы подстроиться под Ваше виденье.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="fh5co-service text-center">
                        <span class="fh5co-service-icon fh5co-icon-pentagon"><i class="icon-infinity"></i></span>
                        <h3>Долговечность</h3>
                        <p>Наши окна ставятся для Ваших правнуков. И простоят ведь.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="fh5co-service text-center">
                        <span class="fh5co-service-icon fh5co-icon-pentagon"><i class="icon-wallet2"></i></span>
                        <h3>Стоимость</h3>
                        <p>Разные ценовые категории. Ведь каждый клиент — особенный.</p>
                    </div>
                </div>
            </div>
            @include('partials.important')
            @if(count($footerArticles) > 0)
                <div class="row row-bottom-padded-sm">
                    <div class="col-md-8 col-md-offset-2 text-center ts-intro">
                        <h2>Популярное:</h2>
                    </div>
                </div>
                <div class="row row-bottom-padded-sm">
                    @foreach($footerArticles as $article)
                        @include('partials.article_badge')
                    @endforeach
                </div>
            @endif
        </div>
    </div>
@endsection