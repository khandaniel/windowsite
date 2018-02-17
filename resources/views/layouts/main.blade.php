<!DOCTYPE html>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{$title}}</title>
    <link rel="manifest" href="manifest.json">
    <meta name="theme-color" content="#FF5126" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{ $description }}"/>
    <meta name="keywords" content="{{ $keywords }}" />

    <!--
      //////////////////////////////////////////////////////

      FREE HTML5 TEMPLATE
      DESIGNED & DEVELOPED by FREEHTML5.CO

      Website: 		http://freehtml5.co/
      Email: 			info@freehtml5.co
      Twitter: 		http://twitter.com/fh5co
      Facebook: 		https://www.facebook.com/fh5co

      //////////////////////////////////////////////////////
       -->

    <!-- Facebook and Twitter integration -->
    <meta property="og:title" content=""/>
    <meta property="og:image" content=""/>
    <meta property="og:url" content=""/>
    <meta property="og:site_name" content=""/>
    <meta property="og:description" content=""/>
    <meta name="twitter:title" content=""/>
    <meta name="twitter:image" content=""/>
    <meta name="twitter:url" content=""/>
    <meta name="twitter:card" content=""/>

    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
    <link rel="shortcut icon" href="/window_logo_48x48.png">

    <link rel="stylesheet" href="/css/animate.css">
    <link rel="stylesheet" href="/css/bootstrap.css">
    <link rel="stylesheet" href="/css/icomoon.css">

    <link rel="stylesheet" href="/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/css/owl.theme.default.min.css">

    <link rel="stylesheet" href="/css/style.css">
    <script src="/js/modernizr-2.6.2.min.js"></script>
    <!--[if lt IE 9]>
    <script src="/js/respond.min.js"></script>
    <![endif]-->
</head>
<body class="boxed">
<!-- Loader -->
<div class="fh5co-loader"></div>

<div id="wrap">

    <div id="fh5co-page">
        <header id="fh5co-header" role="banner">
            <div class="container">
                <a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle dark"><i></i></a>
                <div id="fh5co-logo"><a href="/"><img src="/images/logo.png" width="52" height="52"
                                                      alt="Окна в Харькове"></a></div>
                <nav id="fh5co-main-nav" role="navigation">
                    {!! menu('main', 'partials.menu') !!}
                </nav>
            </div>
        </header>
        @yield('content')
        <footer id="fh5co-footer" role="contentinfo">
            <div class="container">
                <div class="row row-bottom-padded-sm">
                    @include('partials.about')
                    @include('partials.footerlinks')
                    @include('partials.socials')
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="fh5co-copyright">
                            <p class="pull-left">&copy; 2018 All Rights Reserved. </p>
                            <p class="pull-right">Designed by <a href="http://freehtml5.co" target="_blank" rel="noopener">DesignContora</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>

<div class="gototop js-top">
    <a href="#" class="js-gotop"><i class="icon-chevron-down"></i></a>
</div>
<script>
    if('serviceWorker' in navigator) {
        navigator.serviceWorker.register('/sw.js').then(function () { console.log("SW is registered"); });
    }
</script>
<script src="/js/jquery.min.js"></script>
<script src="/js/jquery.easing.1.3.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/owl.carousel.min.js"></script>
<script src="/js/main.js"></script>

</body>
</html>