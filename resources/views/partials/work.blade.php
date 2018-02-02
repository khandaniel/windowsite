@extends('layouts.main')
@section('content')
    <div id="fh5co-intro" class="fh5co-section">
        <div class="container">
            <div class="row row-bottom-padded-sm">
                <div class="col-md-8 col-md-offset-2 text-center ts-intro">
                    <h1>{{ $works_desc->title }}</h1>
                    <p class="fh5co-lead">{{ $works_desc->excerpt }}</p>
                </div>
            </div>
            <div class="row row-bottom-padded-sm">
                <div class="col-md-8" id="fh5co-content">
                    <h2>{{ $work->title }}</h2>
                    {!! $work->text !!}
                </div>
                <div class="col-md-4" id="fh5co-sidebar">
                    <div class="fh5co-service text-left">
                        <img src="{{asset('/storage/'.$work->image)}}" class="img-responsive img-bordered">
                        @if(count($work->articles) > 0)
                            <h3>Как мы это сделали?</h3>
                            <p>Вот ссылки на статьи по этой теме:</p>
                            <ul class="ul_style_1">
                                @foreach($work->articles as $article)
                                    <li><a href="{{ '/articles/'.$article->slug }}">{{ $article->title }}</a></li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection