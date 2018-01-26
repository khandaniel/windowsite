<div class="col-md-3 col-md-push-1 col-sm-12 col-sm-push-0">
    <div class="fh5co-footer-widget">
        <h3>Популярное</h3>
        <ul class="fh5co-footer-link">
            @foreach($footerlinks as $link)
                <li><a href="{{'/articles/'.$link->slug}}">{{$link->title}}</a></li>
            @endforeach
        </ul>
    </div>
</div>