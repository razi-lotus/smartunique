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
    <!-- Start preloader -->
	{{--<div id="preloader">
		<div class="preloader-box">
			<img src="{{ asset('home/images/stock-logo.png') }}" alt="Loader">
			<p class="loading">Loading</p>
		</div>
	</div>--}}
	<!-- End preloader -->


	<header class="header">
		<div class="container">
			<div class="row">
				<div class="col-xl-4 col-lg-4 col-md-4 col-8 d-flex flex-center">
					<div class="logo">
						<a href="/"><img class="res-logo" height="80" src="{{ asset('home/images/stock-logo.png') }}"
								alt="Smart Unique Int Logo"></a>
						<!-- <a href="index"><img src="images/logo.png" alt="Smart Unique Int Logo"></a> -->
					</div>
					<a class="ms-auto me-3 d-md-none d-block" href="{{ route('login') }}">
						<img style="background-color: #0093dd;" class="rounded-circle" height="35"
							src="{{ asset('home/images/manager-2.png') }}">
						</img>
					</a>
				</div>
				<div class="col-xl-8 col-lg-8 col-md-8 col-4">
					<div class="menu-toggle">
						<span></span>
					</div>
					<div class="main-menu">
						<div class="nav-menu text-right">
							<ul>
								<li class="active"><a href="{{ route('home') }}">Home</a></li>
								<div class="login-box d-lg-none d-block">
									<a href="{{ route('login') }}" class="button">Sign up</a>
								</div>
								<li><a href="{{ url('services') }}">Services</a></li>
								<li><a href="{{ url('our_assignment') }}">My Assignment</a></li>
								<li class="menu-dropdwon">
									<a class="d-md-block d-none" href="javascript:void(0);">Pages</a>
									<ul>
										<li><a href="{{ url('job-task') }}">Job Task</a></li>
										<li><a href="{{ url('working-bonus') }}">Working Bonus</a></li>
										<li><a href="{{ url('rewards') }}">Rewards</a></li>
										<li><a href="{{ url('withdraw-method') }}">Withdraw Method</a></li>
										<li><a href="{{ url('career') }}">Career</a></li>
										<li><a href="{{ url('about') }}">About Us</a></li>
										<li><a href="{{ url('contact') }}">Contact us</a></li>
									</ul>
								<li class="d-md-none d-block"><a href="{{ url('job-task') }}">Job Task</a></li>
								<li class="d-md-none d-block"><a href="{{ url('working-bonus') }}">Working Bonus</a></li>
								<li class="d-md-none d-block"><a href="{{ url('rewards') }}">Rewards</a></li>
								<li class="d-md-none d-block"><a href="{{ url('withdraw-method') }}">Withdraw Method</a></li>
								<li class="d-md-none d-block"><a href="{{ url('career') }}">Career</a></li>
								<li class="d-md-none d-block"><a href="{{ url('about') }}">About Us</a></li>
								<li class="d-md-none d-block"><a href="{{ url('contact') }}">Contact us</a></li>
								@if(Auth::user())
									<li><a href="{{ url('team') }}">Team</a></li>
								@endif
								</li>
							</ul>
						</div>
						<div class="login-box d-lg-block d-none">
							<a href="{{ route('login') }}" class="button">Sign up</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>
        @yield('content')

	<footer style="margin-top: -8rem;" class="footer footer-purple relative pt-100" id="footer">
		<canvas id="footer-dots"></canvas>
		<div class="container text-center">
			<script type="text/javascript"
				src="//rf.revolvermaps.com/0/0/8.js?i=51nrmfkj4iw&amp;m=0&amp;c=ff0000&amp;cr1=ffffff&amp;f=arial&amp;l=33"
				async="async"></script>
				
			{{--<div style="background-color: black;box-shadow: 3px 3px 10px 0 #eee inset;height: 50px;padding: 12px 4px;margin: -52px auto;"
			class="sub-title text-uppercase fw-bolder fs-4">CONTACT
			</div>
			<img src="https://upload.wikimedia.org/wikipedia/commons/a/a9/Rotating_earth_%28large%29_transparent.gif">--}}
			<div class="row">
				<div class="col-xl-12 col-lg-12 col-md-12">
					<div class="section-heading text-center">
						<h4 class="sub-title text-uppercase wow fadeInUp fw-bolder fs-4 mt-5 pt-4">CONTACT</h6>
							<!-- <h2 class="title wow fadeInUp">Get In Touch</h2> -->
							<p class="wow fadeInUp">We continuously beat the competition, successfully navigate
								difficult
								obstacles, and
								accomplish all the goals set forth by our clients thanks to our innovative solutions.
							</p>
					</div>
				</div>
				<div class="col-xl-12 col-lg-12 col-md-12 text-center">
					<ul class="contact-link wow fadeInUp">
						<li>
							<span class="contact-icon"><img src="{{ asset('home/images/mail.png') }}" alt="Mail Icon"></span>
							<a href="/cdn-cgi/l/email-protection#e68f888089a6839e878b968a83c885898b"><span
									class="__cf_email__"
									data-cfemail="533a3d353c13362b323e233f367d303c3e">Infosuinternational60@gmail.com</span></a>
						</li>
						<li>
							<span class="contact-icon"><img src="{{ asset('home/images/phone.png') }}" alt="Phone Icon"></span>
							<a href="tel:+92324-1595860">(+92) 324-1595860</a>
						</li>
						<li>
							<span class="contact-icon"><img src="{{ asset('home/images/work-icon-2.png') }}" alt="Telegram Icon"></span>
							<a href="#">World Wide</a>
						</li>
					</ul>
				</div>
				<div class="col-xl-12 col-lg-12 col-md-12">
					<form method="post" class="get-touch contactfrm wow fadeInUp">
						<div class="contactfrmmsg">Thank You! Your message has been sent.</div>
						<div class="row">
							<div class="col-xl-6 col-lg-6 col-md-6">
								<div style="box-shadow: 0px 0px 20px 15px #f2f8ff;" class="form-group">
									<input type="text" name="text" class="form-control" placeholder="Your Name*"
										required="">
								</div>
							</div>
							<div class="col-xl-6 col-lg-6 col-md-6">
								<div style="box-shadow: 0px 0px 20px 15px #f2f8ff;" class="form-group">
									<input type="text" name="text" class="form-control" placeholder="Your Email*"
										required="">
								</div>
							</div>
							<div class="col-xl-12 col-lg-12 col-md-12">
								<div style="box-shadow: 0px 0px 20px 15px #f2f8ff;" class="form-group">
									<textarea class="form-control" placeholder="Your Message*"></textarea>
								</div>
							</div>
							<div class="col-xl-12 col-lg-12 col-md-12 text-center">
								<button class="button">Send Message</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="copyright mt-100">
			<div class="container">
				<div class="row">
					<div class="col-xl-8 col-lg-8 col-md-9 order-r-2">
						<p>&#9400; Smart Unique Int all Rights Reserved. </p>
					</div>
					<div class="col-xl-4 col-lg-4 col-md-3 order-r-1">
						<ul>
							<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
							<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
							<li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
							<li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</footer>
	<style>
		.r25 {
			position: absolute;
			bottom: 0;
			left: 0;
			opacity: .35;
			transition: opacity 500ms;
			transition-delay: 2s;
			font-size: 0;
			display: none !important;
		}
	</style>
    <script src="{{  asset('home/js/jquery-3.4.1.min.js') }}"></script>
	<script src="{{  asset('home/js/bootstrap.min.js') }}"></script>
	<script src="{{  asset('home/js/owl.carousel.min.js') }}"></script>
	<script src="{{  asset('home/js/animation.js') }}"></script>
	<script src="{{  asset('home/js/footer-canvas.js') }}"></script>
	<script src="{{  asset('home/js/custom.js') }}"></script>
    @stack('script')
</body>
</html>
