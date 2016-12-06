<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="{{!empty($seo)?$seo->description:''}}">
    <meta name="keywords" content="{{!empty($seo)?$seo->keyword:''}}">



    <title>{{!empty($system)?$system->title:''}}</title>
    <link href="/assets_frontend/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets_frontend/css/font-awesome.min.css" rel="stylesheet">
    <link href="/assets_frontend/css/prettyPhoto.css" rel="stylesheet">
    <link href="/assets_frontend/css/price-range.css" rel="stylesheet">
    <link href="/assets_frontend/css/animate.css" rel="stylesheet">
    <link href="/assets_frontend/css/main.css" rel="stylesheet">
    <link href="/assets_frontend/css/responsive.css" rel="stylesheet">
    @yield('extra_css')

    <!--[if lt IE 9]>
    <script src="/assets_frontend/js/html5shiv.js"></script>
    <script src="/assets_frontend/js/respond.min.js"></script>
    <![endif]-->
    <link rel="/assets_frontend/shortcut icon" href="/assets_frontend/images/ico/favicon.ico">
    <link rel="/assets_frontend/apple-touch-icon-precomposed" sizes="144x144" href="/assets_frontend/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="/assets_frontend/apple-touch-icon-precomposed" sizes="114x114" href="/assets_frontend/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="/assets_frontend/apple-touch-icon-precomposed" sizes="72x72" href="/assets_frontend/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="/assets_frontend/apple-touch-icon-precomposed" href="/assets_frontend/images/ico/apple-touch-icon-57-precomposed.png">

    {!!!empty($seo)?$seo->google_analytics:''!!}

</head><!--/head-->

<body>

@include('frontend.header')


@yield('content')

@include('frontend.footer')


<script src="/assets_frontend/js/jquery.js"></script>
@yield('extra_js')
<script src="/assets_frontend/js/price-range.js"></script>
<script src="/assets_frontend/js/jquery.scrollUp.min.js"></script>
<script src="/assets_frontend/js/bootstrap.min.js"></script>
<script src="/assets_frontend/js/jquery.prettyPhoto.js"></script>
<script src="/assets_frontend/js/main.js"></script>
<script type="text/javascript">
    $(document).ready(function(){

    });
</script>
</body>
</html>