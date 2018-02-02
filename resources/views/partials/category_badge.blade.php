<div class="col-md-4">
    <div class="fh5co-service text-center">
        <a href="/categories/{{ $category->name }}">
            <span class="fh5co-service-icon fh5co-icon-pentagon"><i><img src="/storage/categories/{{ $category->name }}.png"
                                                                         height="100%"/></i></span>
            <h3>{{ $category->alias }}</h3>
            <p>{{ $category->description }}</p>
        </a>
    </div>
</div>