@extends('layouts.main')
@section('content')
    <div id="fh5co-intro" class="fh5co-section">
        <div class="container">
            <div class="row row-bottom-padded-md">
                <div class="col-md-8 col-md-offset-2 text-center ts-intro">
                    <h1>{{ $works_desc->title }}</h1>
                    <p class="fh5co-lead">{{ $works_desc->excerpt }}</p>
                </div>
            </div>

            <div class="row row-bottom-padded-sm">
                @foreach($works as $work)
                    @include('partials.work_badge')
                @endforeach
            </div>

        </div>
    </div>
@endsection