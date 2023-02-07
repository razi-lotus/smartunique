<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Smart Unique Int</title>

    <link rel="stylesheet" type="text/css" href="{{ asset('home/css/bootstrap.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('home/css/font-awesome.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('home/css/owl.carousel.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('home/css/animations.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('home/css/style.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('home/css/color.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('home/css/responsive.css') }}">

</head>
<body>
    <div>
        @yield('content')
    </div>

    <script src="{{  asset('home/js/jquery-3.4.1.min.js') }}"></script>
	<script src="{{  asset('home/js/bootstrap.min.js') }}"></script>
	<script src="{{  asset('home/js/owl.carousel.min.js') }}"></script>
	<script src="{{  asset('home/js/animation.js') }}"></script>
	<script src="{{  asset('home/js/footer-canvas.js') }}"></script>
	<script src="{{  asset('home/js/custom.js') }}"></script>
    @stack('script')
</body>
</html>
