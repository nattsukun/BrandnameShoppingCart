<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta charset="utf-8" />
    <title>Brandname SC OS </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <link href="/assets/plugins/jquery-polymaps/style.css" rel="stylesheet" type="text/css" media="screen"/>
    <link href="/assets/plugins/jquery-metrojs/MetroJs.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="/assets/plugins/shape-hover/css/demo.css" />
    <link rel="stylesheet" type="text/css" href="/assets/plugins/shape-hover/css/component.css" />
    <link rel="stylesheet" type="text/css" href="/assets/plugins/owl-carousel/owl.carousel.css" />
    <link rel="stylesheet" type="text/css" href="/assets/plugins/owl-carousel/owl.theme.css" />
    <link href="/assets/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" media="screen"/>
    <link href="/assets/plugins/jquery-slider/css/jquery.sidr.light.css" rel="stylesheet" type="text/css" media="screen"/>
    <link href="/assets/plugins/jquery-isotope/isotope.css" rel="stylesheet" type="text/css"/>
    <!-- BEGIN CORE CSS FRAMEWORK -->
    <link href="/assets/plugins/boostrapv3/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="/assets/plugins/boostrapv3/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
    <link href="/assets/plugins/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css"/>
    <link href="/assets/css/animate.min.css" rel="stylesheet" type="text/css"/>
    <!-- END CORE CSS FRAMEWORK -->
    <!-- BEGIN CSS TEMPLATE -->
    <link href="/assets/css/style.css" rel="stylesheet" type="text/css"/>
    <link href="/assets/css/responsive.css" rel="stylesheet" type="text/css"/>
    <link href="/assets/css/custom-icon-set.css" rel="stylesheet" type="text/css"/>
    <link href="/assets/css/magic_space.css" rel="stylesheet" type="text/css"/>
    <link href="/assets/css/tiles_responsive.css" rel="stylesheet" type="text/css"/>

    <!-- END CSS TEMPLATE -->

    @yield('extra_css')

</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="">
<!-- BEGIN HEADER -->
@include('layouts.header')
<!-- END HEADER -->
<!-- BEGIN CONTAINER -->
<div class="page-container row-fluid">

   @include('layouts.sidebar')

    <!-- BEGIN PAGE CONTAINER-->
    <div class="page-content ">
        <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
        <div class="clearfix"></div>
        <div class="content">
           @yield('content')
        </div>
    </div>

</div>

<!-- END CONTAINER -->

<!-- END CONTAINER -->
<!-- BEGIN CORE JS FRAMEWORK-->

<!--[if lt IE 9]>
<script src="/assets/plugins/respond.js"></script>
<![endif]-->

<script src="/assets/plugins/jquery-1.8.3.min.js" type="text/javascript"></script>
<script src="/assets/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
<script src="/assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="/assets/plugins/breakpoints.js" type="text/javascript"></script>
<script src="/assets/plugins/jquery-unveil/jquery.unveil.min.js" type="text/javascript"></script>
<script src="/assets/plugins/jquery-block-ui/jqueryblockui.js" type="text/javascript"></script>
<script src="/assets/plugins/jquery-lazyload/jquery.lazyload.min.js" type="text/javascript"></script>
<!-- END CORE JS FRAMEWORK -->
<!-- BEGIN PAGE LEVEL JS -->
<script src="/assets/plugins/jquery-slider/jquery.sidr.min.js" type="text/javascript"></script>
<script src="/assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="/assets/plugins/webarchScroll.js" type="text/javascript"></script>
<script src="/assets/plugins/pace/pace.min.js" type="text/javascript"></script>
<script src="/assets/plugins/jquery-numberAnimate/jquery.animateNumbers.js" type="text/javascript"></script>
<script src="/assets/plugins/skycons/skycons.js"></script>
<script src="/assets/plugins/owl-carousel/owl.carousel.min.js" type="text/javascript"></script>
@yield('extra_js')
<script src="/assets/plugins/jquery-metrojs/MetroJs.min.js" type="text/javascript" ></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN CORE TEMPLATE JS -->
<script src="/assets/js/core.js" type="text/javascript"></script>

<script type="text/javascript">
    $(document).ready(function () {
        $(".live-tile,.flip-list").liveTile();
    });
</script>

<!-- END CORE TEMPLATE JS -->
</body>
</html>
