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
                        <img src="{{asset("/storage/".$article->image)}}" class="img-responsive img-bordered">
                        @if(count($article->works) > 0)
                            <h3>Что из этого выходит?</h3>
                            <p>Посмотрите наши работы из портфолио:</p>
                            <ul class="ul_style_1">
                                @foreach($article->works as $work)
                                    <li><a href="{{'/portfolio/'.$work->id }}">{{ $work->title }}</a></li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection