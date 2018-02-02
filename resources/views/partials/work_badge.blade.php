<div class="col-md-4">
    <div class="fh5co-service text-center">
        <img src="{{ asset('/storage/'.$work->image) }}" class="img-responsive img-bordered" alt="">
        <h3>{{ $work->title }}</h3>
        <p>{{ $work->description }}</p>
        <p><a href="/portfolio/{{ $work->id }}" class="btn btn-primary btn-outline">Больше</a></p>
    </div>
</div>