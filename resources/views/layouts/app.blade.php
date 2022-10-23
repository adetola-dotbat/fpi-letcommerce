<html lang="en">

<head>
    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
    <title>FPI- Ecommerce</title>
    <meta name="author" content="themesflat.com">

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="stylesheet" type="text/css" href=" {{ asset('customer/stylesheets/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href=" {{ asset('customer/stylesheets/style.css') }}">
    <link rel="stylesheet" type="text/css" href=" {{ asset('customer/stylesheets/responsive.css') }}">

    <link rel="stylesheet" type="text/css" href=" {{ asset('customer/stylesheets/colors/color1.css') }}" id="colors">

    <link rel="stylesheet" type="text/css" href=" {{ asset('customer/stylesheets/animate.css') }}">

    <link href=" {{ asset('customer/icon/favicon.png') }}" rel="shortcut icon">
</head>

<body class="header_sticky header-style-1">


    {{-- @include('layouts.navigation') --}}

    @yield('content')


    <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="{{ asset('customer/javascript/jquery.min.js') }}"></script>
    <script src="{{ asset('customer/javascript/tether.min.js') }}"></script>
    <script src="{{ asset('customer/javascript/bootstrap.min.js') }}"></script>
    <script src="{{ asset('customer/javascript/jquery.easing.js') }}"></script>
    <script src="{{ asset('customer/javascript/parallax.js') }}"></script>
    <script src="{{ asset('customer/javascript/jquery-waypoints.js') }}"></script>
    <script src="{{ asset('customer/javascript/jquery-countTo.js') }}"></script>
    <script src="{{ asset('customer/javascript/jquery.countdown.js') }}"></script>
    <script src="{{ asset('customer/javascript/jquery.flexslider-min.js') }}"></script>
    <script src="{{ asset('customer/javascript/images-loaded.js') }}"></script>
    <script src="{{ asset('customer/javascript/jquery.isotope.min.js') }}"></script>
    <script src="{{ asset('customer/javascript/magnific.popup.min.js') }}"></script>
    <script src="{{ asset('customer/javascript/jquery.hoverdir.js') }}"></script>
    <script src="{{ asset('customer/javascript/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('customer/javascript/equalize.min.js') }}"></script>
    <script src="{{ asset('customer/javascript/gmap3.min.js') }}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAIEU6OT3xqCksCetQeNLIPps6-AYrhq-s&amp;region=GB">
    </script>
    <script src="{{ asset('customer/javascript/jquery-ui.js') }}"></script>
    {{-- <script src="{{ asset('customer/javascript/switcher.js') }}"></script> --}}
    <script src="{{ asset('customer/javascript/jquery.cookie.js') }}"></script>
    <script src="{{ asset('customer/javascript/main.js') }}"></script>

    <script src="{{ asset('customer/rev-slider/js/jquery.themepunch.tools.min.js') }}"></script>
    <script src="{{ asset('customer/rev-slider/js/jquery.themepunch.revolution.min.js') }}"></script>
    <script src="{{ asset('customer/javascript/rev-slider.js') }}"></script>

    <script src="{{ asset('customer/rev-slider/js/extensions/revolution.extension.actions.min.js') }}"></script>
    <script src="{{ asset('customer/rev-slider/js/extensions/revolution.extension.carousel.min.js') }}"></script>
    <script src="{{ asset('customer/rev-slider/js/extensions/revolution.extension.kenburn.min.js') }}"></script>
    <script src="{{ asset('customer/rev-slider/js/extensions/revolution.extension.layeranimation.min.js') }}"></script>
    <script src="{{ asset('customer/rev-slider/js/extensions/revolution.extension.migration.min.js') }}"></script>
    <script src="{{ asset('customer/rev-slider/js/extensions/revolution.extension.navigation.min.js') }}"></script>
    <script src="{{ asset('customer/rev-slider/js/extensions/revolution.extension.parallax.min.js') }}"></script>
    <script src="{{ asset('customer/rev-slider/js/extensions/revolution.extension.slideanims.min.js') }}"></script>
    <script src="{{ asset('customer/rev-slider/js/extensions/revolution.extension.video.min.js') }}"></script>



</body>

</html>
