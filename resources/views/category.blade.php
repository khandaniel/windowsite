@extends('layouts.main')
@section('content')
    <div id="fh5co-intro" class="fh5co-section">
        <div class="container">
            <div class="row row-bottom-padded-sm">
                <div class="col-md-8 col-md-offset-2 text-center ts-intro">
                    <h1>Вот что у нас есть в категории &laquo;{{ $category_alias }}&raquo;:</h1>
                </div>
            </div>
            @foreach($articles as $article)
                @include('partials.article_badge')
            @endforeach
            @foreach($works as $work)
                @include('partials.work_badge')
            @endforeach
        </div>
    </div>
@endsection