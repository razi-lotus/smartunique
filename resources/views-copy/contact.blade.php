@extends('layouts.homelayout')

@section('content')
	<main class="main">
		<section class="page-banner text-center relative d-md-block d-none">
			<div class="container">
				<div class="row">
					<div class="col-xl-12 col-lg-12 col-md-12">
						<h1 class="page-title wow fadeInUp">Contact Us</h1>
						<ul class="breadcum wow fadeInUp">
							<li><a href="index.html">Home</a></li>
							<li>Pages</li>
							<li>Contact</li>
						</ul>
					</div>
				</div>
			</div>
		</section>

		<section class="contact-main bluish-purple relative overflow-h ptb-100">
			<div class="container">
				<div class="row">
					<div class="col-xl-5 col-lg-5 col-md-12 wow fadeInLeft">
						<div class="contact-content">
							<h2 class="contact-title mt-md-4 mt-5 pt-md-0 pt-4 text-center">Contact Us</h2>
							<p>We continuously beat the competition, successfully navigate
								difficult
								obstacles, and
								accomplish all the goals set forth by our clients thanks to our innovative solutions.
							</p>
							<ul>
								<li>
									<span class="contact-icon"><img src="{{ asset('home/images/phone.png') }}" alt="Phone Icon"></span>
									<a class="contact-label" href="tel:+92324-1595860">(+92) 324-1595860</a>
								</li>
								<li>
									<span class="contact-icon"><img src="{{ asset('home/images/mail.png') }}" alt="Mail Icon"></span>
									<a class="contact-label"
										href="/cdn-cgi/l/email-protection#e68f888089a6839e878b968a83c885898b"><span
											class="__cf_email__"
											data-cfemail="533a3d353c13362b323e233f367d303c3e">Infosuinternational60@gmail.com</span></a>
								</li>
								<li>
									<span class="contact-icon"><img src="{{ asset('home/images/location-icon.png') }}"
											alt="Location Icon"></span>
									<a class="contact-label" href="#">World Wide</a>
								</li>
							</ul>
						</div>
					</div>
					<div class="col-xl-7 col-lg-7 col-md-12 wow fadeInRight">
						<div class="contact-form">
							<h2 class="contact-title">Leave a message here</h2>
							<div class="contactfrmmsg">Thank You! Your message has been sent.</div>
							<form method="post" class="contactfrm">
								<div class="row">
									<div class="col-xl-6 col-lg-6 col-md-6">
										<div class="form-group">
											<input type="text" name="text" class="form-control" placeholder="Name*"
												required="">
										</div>
									</div>
									<div class="col-xl-6 col-lg-6 col-md-6">
										<div class="form-group">
											<input type="text" name="text" class="form-control" placeholder="Email*"
												required="">
										</div>
									</div>
									<div class="col-xl-6 col-lg-6 col-md-6">
										<div class="form-group">
											<input type="text" name="text" class="form-control" placeholder="Subject*"
												required="">
										</div>
									</div>
									<div class="col-xl-6 col-lg-6 col-md-6">
										<div class="form-group">
											<input type="text" name="text" class="form-control" placeholder="Phone*"
												required="">
										</div>
									</div>
									<div class="col-xl-12 col-lg-12 col-md-12">
										<div class="form-group">
											<textarea class="form-control" placeholder="Message"></textarea>
										</div>
									</div>
									<div class="col-xl-12 col-lg-12 col-md-12">
										<button class="button">Submit</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</section>

		<!-- <div class="contact-map bluish-purple relative overflow-h pb-100">
			<div class="container">
				<div class="row">
					<div class="col-xl-12 col-lg-12 col-md-12 wow fadeInUp">
						<iframe class="map-location"
							src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3748.1812836849363!2d144.95343106869794!3d-37.81739907631358!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad65d4dd5a05d97%3A0x3e64f855a564844d!2s121+King+St%2C+Melbourne+VIC+3000%2C+Australia!5e0!3m2!1sen!2sin!4v1562916623921!5m2!1sen!2sin"
							style="border:0;width:100%;" allowfullscreen=""></iframe>
					</div>
				</div>
			</div>
		</div> -->
	</main>
@endsection
