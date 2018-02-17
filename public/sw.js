importScripts('/cache-polyfill.js');

self.addEventListener('install', function (e) {
    e.waitUntil(
        caches.open('windowpane').then(function (cache) {
            return cache.addAll([
                // '/',
                // '/css/animate.css',
                // '/css/bootstrap.css',
                // '/css/icomoon.css',
                // '/css/owl.carousel.min.css',
                // '/css/owl.theme.default.min.css',
                // '/css/style.css',
                // '/fonts/icomoon/icomoon.ttf?stsype',
                // '/images/Preloader_2.gif',
                // '/images/logo.png',
                // '/js/bootstrap.min.js',
                // '/js/jquery.easing.1.3.js',
                // '/js/jquery.min.js',
                // '/js/main.js',
                // '/js/modernizr-2.6.2.min.js',
                // '/js/owl.carousel.min.js',
                // '/storage/pages/February2018/KjOfrOTQJJtqsDNBvH5R.jpg',
                // '/storage/pages/January2018/lZVTUtqRUK46Im7OPZKM.jpg',
                // '/storage/slider/about/default.jpg'
            ]);
        })
    );
});

self.addEventListener('fetch', function(event) {

    console.log(event.request.url);

    event.respondWith(

        caches.match(event.request).then(function(response) {

            return response || fetch(event.request);

        })

    );

});