<div class="row row-bottom-padded-sm">
    <div class="col-md-6">
        <p><img src="{{ '/storage/' . $important->image }}" alt="" class="img-responsive img-bordered"></p>
    </div>
    <div class="col-md-6 padded-top">
        <h3>{{ $important->title }}</h3>
        {!! $important->body !!}
    </div>
</div>