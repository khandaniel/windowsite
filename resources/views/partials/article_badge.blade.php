<div class="col-md-4">
    <div class="fh5co-service text-center">
        <img src="{{ asset("/storage/".$article->image) }}" class="img-responsive img-bordered" alt="">
        <h3>{{ $article->title }}</h3>
        <p>{{ $article->description }}</p>
        <p><a href="/articles/{{ $article->slug }}" class="btn btn-primary btn-outline">Больше</a></p>
    </div>
</div>