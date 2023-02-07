@extends('layouts.homelayout')

@section('content')
	<main class="main">
		<section class="page-banner text-center d-md-block d-none">
			<div class="container">
				<div class="row">
					<div class="col-xl-12 col-lg-12 col-md-12">
						<h1 class="page-title wow fadeInUp">Team</h1>
						<ul class="breadcum wow fadeInUp">
							<li><a href="index.html">Home</a></li>
							<li>Team</li>
						</ul>
					</div>
				</div>
			</div>
		</section>

		<section class="our-team bluish-purple relative overflow-h ptb-100">
			<div class="container relative">
				<div class="row">
					<div class="col-xl-12 col-lg-12 col-md-12">
						<div class="section-heading text-center">
							<h6 class="sub-title text-uppercase wow fadeInUp mt-md-4 mt-5">Meet the Team</h6>
							<h2 class="title wow fadeInUp">Our Team</h2>
							<!-- <p class="wow fadeInUp">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
								eiusmod tempor incididunt ut labore et dolore magna aliqua Ut enim ad minim veniam.</p> -->
						</div>
					</div>
				</div>
				<div class="row relative z-index-1 justify-center">
					<div class="col-xl-3 col-lg-3 col-md-4 team-box-main wow fadeInUp">
						<div class="team-box text-center purple">
							<div class="team-img">
								<a href="javascript:void(0)"><img src="{{ asset('home/images/team-1.jpg') }}" alt="Team Member"></a>
							</div>
							<h5 class="member-name"><a href="javascript:void(0)">Susan J. Newsom</a></h5>
							<span class="member-post">Co-Founder</span>
							<ul>
								<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
								<li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
								<li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
							</ul>
						</div>
					</div>
					<div class="col-xl-3 col-lg-3 col-md-4 team-box-main wow fadeInUp">
						<div class="team-box text-center purple">
							<div class="team-img">
								<a href="javascript:void(0)"><img src="{{ asset('home/images/team-2.jpg') }}" alt="Team Member"></a>
							</div>
							<h5 class="member-name"><a href="javascript:void(0)">Shripati Newsom</a></h5>
							<span class="member-post">Co-Founder</span>
							<ul>
								<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
								<li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
								<li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
							</ul>
						</div>
					</div>
					<div class="col-xl-3 col-lg-3 col-md-4 team-box-main wow fadeInUp">
						<div class="team-box text-center purple">
							<div class="team-img">
								<a href="javascript:void(0)"><img src="{{ asset('home/images/team-3.jpg') }}" alt="Team Member"></a>
							</div>
							<h5 class="member-name"><a href="javascript:void(0)">Susan Perseus</a></h5>
							<span class="member-post">Co-Founder</span>
							<ul>
								<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
								<li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
								<li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
							</ul>
						</div>
					</div>
					<div class="col-xl-3 col-lg-3 col-md-4 team-box-main wow fadeInUp">
						<div class="team-box text-center purple">
							<div class="team-img">
								<a href="javascript:void(0)"><img src="{{ asset('home/images/team-4.jpg') }}" alt="Team Member"></a>
							</div>
							<h5 class="member-name"><a href="javascript:void(0)">Indrajit Theia</a></h5>
							<span class="member-post">Co-Founder</span>
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
		</section>
	</main>
@endsection
