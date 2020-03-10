<!DOCTYPE html>
<html lang="zxx" class="no-js">
<head>
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon-->
    <link rel="shortcut icon" href="{{ asset('ShowUser/img/fav.png')}}">
    <!-- Author Meta -->
    <meta name="author" content="colorlib">
    <!-- Meta Description -->
    <meta name="description" content="">
    <!-- Meta Keyword -->
    <meta name="keywords" content="">
    <!-- meta character set -->
    <meta charset="UTF-8">
    <!-- Site Title -->
    <title>Marco</title>

    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
    <!-- CSS  ============================================= -->
    <link rel="stylesheet" href="{{ asset('ShowUser/css/linearicons.css')}}">
    <link rel="stylesheet" href="{{ asset('ShowUser/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{ asset('ShowUser/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{ asset('ShowUser/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{ asset('ShowUser/css/jquery-ui.css')}}">
    <link rel="stylesheet" href="{{ asset('ShowUser/css/nice-select.css')}}">
    <link rel="stylesheet" href="{{ asset('ShowUser/css/animate.min.css')}}">
    <link rel="stylesheet" href="{{ asset('ShowUser/css/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{ asset('ShowUser/css/main.css')}}">
</head>
<body>


<!-- #header -->

@include('layout.PageView.header')

@yield('content')


@include('layout.PageView.footer')


<script src="{{ asset('ShowUser/js/vendor/jquery-2.2.4.min.js')}}"></script>
<script src="{{ asset('ShowUser/js/popper.min.js')}}"></script>
<script src="{{ asset('ShowUser/js/vendor/bootstrap.min.js')}}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
<script src="{{ asset('ShowUser/js/jquery-ui.js')}}"></script>
<script src="{{ asset('ShowUser/js/easing.min.js')}}"></script>
<script src="{{ asset('ShowUser/js/hoverIntent.js')}}"></script>
<script src="{{ asset('ShowUser/js/superfish.min.js')}}"></script>
<script src="{{ asset('ShowUser/js/jquery.ajaxchimp.min.js')}}"></script>
<script src="{{ asset('ShowUser/js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{ asset('ShowUser/js/jquery.nice-select.min.js')}}"></script>
<script src="{{ asset('ShowUser/js/owl.carousel.min.js')}}"></script>
<script src="{{ asset('ShowUser/js/isotope.pkgd.min.js')}}"></script>
<script src="{{ asset('ShowUser/js/mail-script.js')}}"></script>
<script src="{{ asset('ShowUser/js/main.js')}}"></script>
</body>
</html>
