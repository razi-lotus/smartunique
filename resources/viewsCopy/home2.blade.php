@extends('layouts.homelayout')

@section('content')
<!-- Start preloader -->
<div id="preloader">
    <div class="preloader-box">
        <img src="{{ asset('home/images/stock-logo.png') }}" alt="Loader">
        <p class="loading">Loading</p>
    </div>
</div>
<!-- End preloader -->

<header class="header">
    <div class="container">
        <div class="row">
            <div class="col-xl-4 col-lg-4 col-md-4 col-8 d-flex flex-center">
                <div class="logo">
                    <a href="index.html"><img class="res-logo" height="80" src="{{ asset('home/images/stock-logo.png') }}"
                            alt="Smart Unique Int Logo"></a>
                    <!-- <a href="index.html"><img src="images/logo.png" alt="Smart Unique Int Logo"></a> -->
                </div>
            </div>
            <div class="col-xl-8 col-lg-8 col-md-8 col-4">
                <div class="menu-toggle">
                    <span></span>
                </div>
                <div class="main-menu">
                    <div class="nav-menu text-right">
                        <ul>
                            <li class="active"><a href="{{ route('home') }}">Home</a></li>
                            <!-- <li class="menu-dropdwon">
                                <a href="javascript:void(0)">Pages</a>
                                <ul>
                                    <li><a href="about.html">About</a></li>
                                    <li><a href="token-sale.html">Token Sale</a></li>
                                    <li><a href="blog-list.html">Blog Listing</a></li>
                                    <li><a href="blog-detail.html">Blog Detail</a></li>
                                    <li><a href="contact.html">Contact</a></li>
                                    <li><a href="faq.html">FAQ</a></li>
                                    <li><a href="404.html">404 Page</a></li>
                                </ul>
                            </li>
                            <li><a href="feature.html">Feature</a></li>
                            <li><a href="roadmap.html">Roadmap</a></li>
                            <li><a href="team.html">Team</a></li> -->
                        </ul>
                    </div>
                    <div class="login-box">
                        <a href="{{ route('login') }}" class="button">Sign in</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<main class="main">
    <section class="home-banner relative overflow-h">
        <div class="container">
            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-12 d-flex flex-center order-md-first order-last">
                                <div class="banner-content relative z-index-1 mt-md-0 mt-4">
                                    <h1 class="banner-title wow fadeInLeft"><span>Start Earning Today!</span>
                                    </h1>
                                    <!-- <h1 class="banner-title wow fadeInLeft">Invest In <span>Smart Unique Int</span> Way To Trade</h1> -->
                                    <p class="wow fadeInLeft">We will receive not what we idly wish for but what we
                                        justly earn.our rewards will
                                        always be in exact proportion to our service.</p>
                                    <a href="about.html" class="button wow fadeInLeft">Learn More <i
                                            class="fa fa-angle-right" aria-hidden="true"></i></a>
                                </div>
                            </div>
                            <div
                                class="col-xl-6 col-lg-6 col-md-12 wow fadeInUp order-md-last order-first mb-md-0 mb-5">
                                <div class="banner-img">
                                    <img class="rounded-3" src="{{ asset('home/images/pattern-1.jpg') }}" alt="Banner Image">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-12 d-flex flex-center order-md-first order-last">
                                <div class="banner-content relative z-index-1 mt-md-0 mt-5">
                                    <h1 class="banner-title "><span>We teach you How to Earn!
                                        </span>
                                    </h1>
                                    <!-- <h1 class="banner-title ">Invest In <span>Smart Unique Int</span> Way To Trade</h1> -->
                                    <p class="">Life will not make allowance for you but it will pay
                                        you what you earn.
                                    </p>
                                    <a href="about.html" class="button ">Learn More <i class="fa fa-angle-right"
                                            aria-hidden="true"></i></a>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-12 order-md-last order-first">
                                <div class="banner-img">
                                    <img class="rounded-3" src="{{ asset('home/images/pattern-2.jpg') }}" alt="Banner Image">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-12 d-flex flex-center order-md-first order-last">
                                <div class="banner-content relative z-index-1 mt-md-0 mt-5">
                                    <h1 class="banner-title "><span>Don't waste your time!
                                        </span>
                                    </h1>
                                    <!-- <h1 class="banner-title ">Invest In <span>Smart Unique Int</span> Way To Trade</h1> -->
                                    <p class="">Time is money and money is everything.
                                    </p>
                                    <a href="about.html" class="button ">Learn More <i class="fa fa-angle-right"
                                            aria-hidden="true"></i></a>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-12 order-md-last order-first">
                                <div class="banner-img">
                                    <img class="rounded-3" src="{{ asset('home/images/pattern-3.jpg') }}" alt="Banner Image">
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                        data-bs-slide="prev">
                        <div style="background-color: #10b0cf;" class="px-2 pt-2 rounded-circle">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </div>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                        data-bs-slide="next">
                        <div style="background-color: #10b0cf;" class="px-2 pt-2 rounded-circle">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </div>
                    </button>
                </div>
            </div>
        </div>
    </section>
    <!-- purple class was assinged to this section -->
    <section style="margin-top: -8rem;" class="features purple ptb-100 overflow-h">
        <div class="container ptb-100 ptb-0 relative">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 relative z-index-1">
                    <div class="section-heading text-center">
                        <!-- <h6 class="sub-title text-uppercase wow fadeInUp">What is Smart Unique Int</h6> -->
                        <h2 style="color:#23257c !important;" class="title wow fadeInUp text-white mt-md-4">Learn
                            How
                            to
                            Earn!
                        </h2>
                        <p class="wow fadeInUp">A happy life is one spent in learning, earning and yearning</p>
                    </div>
                </div>
            </div>
            <div class="row relative z-index-1">
                <div class="col-lg-6 col-md-12 wow fadeInRight order-md-first order-last">
                    <div class="mission-content">
                        <h3 class="mission-title text-white">Smart Way to Make Money Online</h3>
                        <p>Technology has been able to permeate every element of our society, enhancing
                            everything from our social interactions to the realisation of our entrepreneurial
                            aspirations. You can take advantage of the limitless opportunities the internet has to
                            offer by building a website and broadening your reach. <br>
                            And by that, we mean chances to make money. Our book on how to make money online
                            will provide you tested strategies that have helped millions of individuals, whether
                            you'r
                            teacher, writer, web designer, or aspiring influencer.
                        </p>
                    </div>
                </div>
                <div class="col-lg-6 order-md-last order-first">
                    <div class="row ms-md-5">
                        <div class="col-12 feature-box wow fadeInUp">
                            <img class="rounded-3 res-how" height="350" src="{{ asset('home/images/smart-way.jpg') }}"
                                class="relative z-index-1" alt="Works Image">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section style="margin-top: -8rem;" class="features bg-transparent ptb-100 overflow-h">
        <div class="container ptb-100 relative">
            <div class="row relative z-index-1">
                <div class="col-lg-6 order-first">
                    <div class="row me-md-5">
                        <div class="col-12 feature-box wow fadeInUp">
                            <img class="rounded-3 res-how" height="350" src="images/if-you-are-looking.jpg"
                                class="relative z-index-1" alt="Works Image">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 wow fadeInRight order-last">
                    <div class="mission-content">
                        <h3 class="mission-title mt-2">If you're looking for an easy way to earn fast
                            money
                            online,
                            you've found it.
                        </h3>
                        <p>We moulded this System to make it "As simple as liable" to bring in genuine cash!
                            Our System will empower you to procure additional pay, online brief period and an
                            extensive stretch. This isn't a "get rich quick" structure but an "adjusted increment
                            income" program. This is the most straightforward and ideal way of making genuine
                            money on the web. Try not to hesitate to go along with us.

                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section style="margin-top: -7rem;" class="features bg-transparent ptb-100 overflow-h">
        <div class="container ptb-100 relative">
            <div class="row relative z-index-1">
                <div class="col-lg-6 order-lg-last order-first">
                    <div class="row ms-md-5">
                        <div class="col-12 feature-box wow fadeInUp">
                            <img class="rounded-3 res-how" height="350" src="images/2nd-last-para.webp"
                                class="relative z-index-1" alt="Works Image">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 wow fadeInRight order-lg-first order-last">
                    <div class="mission-content">
                        <h3 class="mission-title mt-2 text-dark">Stream of income.
                        </h3>
                        <p>You may have considered ways to make money online if you're looking for a side
                            business or fresh idea. Making money online when you know what you're doing is
                            really simple. You can work on it from the convenience of your home, either full- or
                            part-time. Who wouldn't like to earn some additional money while still in their
                            comfort.
                            Here, we examine a variety of internet income streams. All you need to do is set
                            aside a particular number of hours in your day to finish the work at hand. Aside from
                            that, you will have the opportunity to have a greater understanding of the business.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section style="margin-top: -5rem;" class="features bluish-purple ptb-100 overflow-h">
        <div class="container relative">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 relative z-index-1">
                    <div class="section-heading text-center">
                        <!-- <h6 class="sub-title text-uppercase wow fadeInUp">Smart Unique Int Feature</h6> -->
                        <h2 class="title wow fadeInUp">Our Projects</h2>
                        <!-- <p class="wow fadeInUp">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                            eiusmod tempor incididunt ut labore et dolore magna aliqua Ut enim ad minim veniam.</p> -->
                    </div>
                </div>
            </div>
            <div class="row relative z-index-1">
                <div class="col-xl-4 col-xl-4 col-md-4 feature-box wow fadeInUp">
                    <div class="box-outer mb-30 transition">
                        <div style="box-shadow: 0px 0px 20px 15px #f2f8ff; border-radius: 15px;"
                            class="box-inner frontend text-center">
                            <img src="images/mortarboard.png" class="feature-icon mb-30" alt="EDUACATION">
                            <h4 class="feature-title mb-20">
                                <a href="feature.html">EDUCATION</a>
                            </h4>
                            <p>Its all about learning something new and trendy,join our e learning platform to
                                upscale your skills and income level.</p>
                        </div>
                        <div style="box-shadow: 0px 0px 20px 15px #f2f8ff; border-radius: 15px;"
                            class="box-inner backend">
                            <p>Its all about learning something new and trendy,join our e learning platform to
                                upscale your skills and income level.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-xl-4 col-md-4 feature-box wow fadeInUp">
                    <div class="box-outer mb-30 transition">
                        <div style="box-shadow: 0px 0px 20px 15px #f2f8ff; border-radius: 15px;"
                            class="box-inner frontend text-center">
                            <img src="images/seo.png" class="feature-icon mb-30" alt="ADVERTISEMENT">
                            <h4 class="feature-title mb-20"><a href="feature.html">ONLINE ADVERTISEMENT</a></h4>
                            <p>Advertise your business on multiple social sides in ad format to reach more clients
                                and build relationships with your customers.
                            </p>
                        </div>
                        <div style="box-shadow: 0px 0px 20px 15px #f2f8ff; border-radius: 15px;"
                            class="box-inner backend">
                            <p>Advertise your business on multiple social sides in ad format to reach more clients
                                and build relationships with your customers.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-xl-4 col-md-4 feature-box wow fadeInUp">
                    <div class="box-outer mb-30 transition">
                        <div style="box-shadow: 0px 0px 20px 15px #f2f8ff; border-radius: 15px;"
                            class="box-inner frontend text-center">
                            <img src="images/laptop.png" class="feature-icon mb-30" alt="DIGITAL MARKETING">
                            <h4 class="feature-title mb-20"><a href="feature.html">DIGITAL MARKETING</a></h4>
                            <p>Promote your brand to connect with potential clients by using digital
                                platforms .This includes social media, Seo, Email marketing, and Text
                                marketing, Content Creation etc.</p>
                        </div>
                        <div style="box-shadow: 0px 0px 20px 15px #f2f8ff; border-radius: 15px;"
                            class="box-inner backend">
                            <p>Promote your brand to connect with potential clients by using digital
                                platforms .This includes social media, Seo, Email marketing, and Text
                                marketing, Content Creation etc.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-xl-4 col-md-4 feature-box wow fadeInUp">
                    <div class="box-outer mb-30 transition">
                        <div style="box-shadow: 0px 0px 20px 15px #f2f8ff; border-radius: 15px;"
                            class="box-inner frontend text-center">
                            <img src="images/calendar.png" class="feature-icon mb-30" alt="EVENT ORGANIZATION">
                            <h4 class="feature-title mb-20"><a href="feature.html">CONSTRUCTION</a></h4>
                            <p>we are providing complete residential and commercial designs which
                                include grey structures and fully furnished structure.</p>
                        </div>
                        <div style="box-shadow: 0px 0px 20px 15px #f2f8ff; border-radius: 15px;"
                            class="box-inner backend">
                            <p>We are providing complete residential and commercial designs which
                                include grey structures and fully furnished structure.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-xl-4 col-md-4 feature-box wow fadeInUp">
                    <div class="box-outer mb-30 transition">
                        <div style="box-shadow: 0px 0px 20px 15px #f2f8ff; border-radius: 15px;"
                            class="box-inner frontend text-center">
                            <img src="images/manager.png" class="feature-icon mb-30" alt="MANAGEMENT">
                            <h4 class="feature-title mb-20">
                                <a href="feature.html">MANAGEMENT</a>
                            </h4>
                            <p>It's all about doing administrative tasks like managing data, supervising staff,
                                greeting visitors at the receptionist and H.R assistant, etc.
                            </p>
                        </div>
                        <div style="box-shadow: 0px 0px 20px 15px #f2f8ff; border-radius: 15px;"
                            class="box-inner backend">
                            <p>It's all about doing administrative tasks like managing data, supervising staff,
                                greeting visitors at the receptionist and H.R assistant, etc. .</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section style="margin-top: -8rem;" class="features purple ptb-100 overflow-h">
        <div class="container relative">
            <!-- <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 relative z-index-1">
                    <div class="section-heading text-center">
                        <h6 class="sub-title text-uppercase wow fadeInUp">Smart Unique Int Feature</h6>
                        <h2 style="color:#23257c;" class="title wow fadeInUp text-white">Our Services</h2>
                        <p class="wow fadeInUp">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                            eiusmod tempor incididunt ut labore et dolore magna aliqua Ut enim ad minim veniam.</p>
                    </div>
                </div>
            </div> -->
            <div class="row relative z-index-1 ptb-100">
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-6 feature-box wow fadeInUp">
                            <div class="box-outer mb-30 transition">
                                <div style="box-shadow: 0px 0px 10px 8px #f2f8ff; border-radius: 15px;"
                                    class="box-inner frontend text-center">
                                    <h1 class="banner-title wow fadeInLeft"><span class="text-white">1000+</span>
                                    </h1>
                                    <h4 class="feature-title mb-20">
                                        <a class="text-white" href="feature.html">CUSTOMERS SERVED</a>
                                    </h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 feature-box wow fadeInUp">
                            <div class="box-outer mb-30 transition">
                                <div style="box-shadow: 0px 0px 10px 8px #f2f8ff; border-radius: 15px;"
                                    class="box-inner frontend text-center">
                                    <h1 class="banner-title wow fadeInLeft"><span class="text-white">50+</span>
                                    </h1>
                                    <h4 class="feature-title mb-20">
                                        <a class="text-white" href="feature.html">PROFESSIONAL TRAINERS</a>
                                    </h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 feature-box wow fadeInUp">
                            <div class="box-outer mb-30 transition">
                                <div style="box-shadow: 0px 0px 10px 8px #f2f8ff; border-radius: 15px;"
                                    class="box-inner frontend text-center">
                                    <h1 class="banner-title wow fadeInLeft"><span class="text-white">250+</span>
                                    </h1>
                                    <h4 class="feature-title mb-20">
                                        <a class="text-white" href="feature.html">COURSES DELIEVERD</a>
                                    </h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 feature-box wow fadeInUp">
                            <div class="box-outer mb-30 transition">
                                <div style="box-shadow: 0px 0px 10px 8px #f2f8ff; border-radius: 15px;"
                                    class="box-inner frontend text-center">
                                    <h1 class="banner-title wow fadeInLeft"><span class="text-white">24/7</span>
                                    </h1>
                                    <h4 class="feature-title mb-20">
                                        <a class="text-white" href="feature.html">CUSTOMERS SERVICE</a>
                                    </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 wow fadeInRight">
                    <div class="mission-content">
                        <h3 class="mission-title text-white">WHO WE ARE</h3>
                        <p>Smart u international is a digital earning platform. We are working on various
                            projects.
                            We designed individual learning and earning Systems that helped you generate good
                            income daily, weekly, and monthly basis. <br>
                            Our objective is to make working from home easier, which is why we collect all authentic
                            work from
                            home jobs from around the web and post them on our website so you can simply locate the
                            suitable
                            employment for you. We make it very simple by allowing you to search for work from home
                            jobs
                            based on the most recent searches and job category (such as data entry jobs, ad
                            posting,marketing,
                            management etc.). Candidates who wish to apply should complete the necessary Online
                            Form.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section style="margin-top: -7rem;" style="border-radius: 40% 15% 0% 0%;"
        class="roadmap bg-transparent relative overflow-h ptb-100">

        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12">
                    <div class="section-heading text-center">
                        <!-- <h6 class="sub-title text-uppercase wow fadeInUp">Roadmap</h6> -->
                        <h2 class="title wow fadeInUp">Skill Development</h2>
                        <p class="wow fadeInUp">Learn new skills, earn or advance your career at your own pace.
                            Build your bridge to
                            be better anywhere, at any time, with Smart u international's.
                            Our instructors come to you to provide live, in-person training.
                            Continue to learn in critical moments
                            Expert-led courses on a wide range of online class topics for all stages of your
                            career.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="custom-progress wow fadeInUp">
            <div style="color: #383636;" class="text-start h6 fw-bold">
                EDUCATION
            </div>
            <div class="progress2 progress-moved2">
                <div class="progress-bar2">
                </div>
            </div>
        </div>
        <div class="custom-progress wow fadeInUp">
            <div style="color: #383636;" class="text-start h6 fw-bold">
                ONLINE ADVERTISEMENT
            </div>
            <div class="progress2 progress-moved5">
                <div class="progress-bar2">
                </div>
            </div>
        </div>
        <div class="custom-progress wow fadeInUp">
            <div style="color: #383636;" class="text-start h6 fw-bold">
                DIGITAL MARKETING
            </div>
            <div class="progress2 progress-moved3">
                <div class="progress-bar2">
                </div>
            </div>
        </div>
        <div class="custom-progress wow fadeInUp">
            <div style="color: #383636;" class="text-start h6 fw-bold">
                CONSTRUCTION
            </div>
            <div class="progress2 progress-moved7">
                <div class="progress-bar2">
                </div>
            </div>
        </div>
        <div class="custom-progress wow fadeInUp">
            <div style="color: #383636;" class="text-start h6 fw-bold">
                MANGEMENT
            </div>
            <div class="progress2 progress-moved4">
                <div class="progress-bar2">
                </div>
            </div>
        </div>
        <div class="custom-progress wow fadeInUps">
            <div style="color: #383636;" class="text-start h6 fw-bold">
                PROJECTS
            </div>
            <div class="progress2 progress-moved6">
                <div class="progress-bar2">
                </div>
            </div>
        </div>
        <div class="curve"></div>
    </section>


    <section style="margin-top: -8rem;" class="features purple ptb-100 overflow-h">
        <div class="container relative">
            <div class="row relative z-index-1 ptb-100 ptb-20">
                <div class="col-12">
                    <div class="row">
                        <div class="col-lg-6 feature-box wow fadeInUp">
                            <div class="box-outer mb-30 transition">
                                <div style="box-shadow: 0px 0px 10px 8px #f2f8ff; border-radius: 15px;"
                                    class="box-inner frontend text-center">
                                    <h3 class="banner-title wow fadeInLeft"><span class="text-white">Learn Your
                                            Way</span>
                                    </h3>
                                    <h5 class="feature-title mb-20">
                                        <a class="text-white" href="feature.html">We offer adaptable training
                                            solutions for individuals, teams, and businesses. We
                                            have developed an extensive portfolio of live and pre-recorded training
                                            based on
                                            years of industry experience and are ready to assist you in making the
                                            most of it. We
                                            provide dedicated support packages, extracurricular learning resources,
                                            and
                                            immersive tools to engage students of all types and skill levels.
                                        </a>
                                    </h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 feature-box wow fadeInUp">
                            <div class="box-outer mb-30 transition">
                                <div style="box-shadow: 0px 0px 10px 8px #f2f8ff; border-radius: 15px;"
                                    class="box-inner frontend text-center">
                                    <h3 class="banner-title wow fadeInLeft"><span class="text-white">Team
                                            Support</span>
                                    </h3>
                                    <h5 class="feature-title mb-20">
                                        <a class="text-white" href="feature.html">We respect and acknowledge the
                                            needs of our customers. We work hard to develop
                                            strong, mutually beneficial connections with them.
                                            If you have any queries or issues, you may anticipate receiving prompt
                                            and polite
                                            responses.
                                        </a>
                                    </h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 feature-box wow fadeInUp">
                            <div class="box-outer mb-30 transition">
                                <div style="box-shadow: 0px 0px 10px 8px #f2f8ff; border-radius: 15px;"
                                    class="box-inner frontend text-center">
                                    <h3 class="banner-title wow fadeInLeft"><span class="text-white">Live
                                            On-Site</span>
                                    </h3>
                                    <h5 class="feature-title mb-20">
                                        <a class="text-white" href="feature.html">Our instructors come to you to
                                            provide live, face-to-face training.
                                            Live training in a digital classroom environment.</a>
                                    </h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 feature-box wow fadeInUp">
                            <div class="box-outer mb-30 transition">
                                <div style="box-shadow: 0px 0px 10px 8px #f2f8ff; border-radius: 15px;"
                                    class="box-inner frontend text-center">
                                    <h3 class="banner-title wow fadeInLeft"><span class="text-white">Our
                                            Perspectives</span>
                                    </h3>
                                    <h5 class="feature-title mb-20">
                                        <a class="text-white" href="feature.html">We continuously beat the
                                            competition, successfully navigate difficult obstacles, and
                                            accomplish all the goals set forth by our clients thanks to our
                                            innovative solutions.
                                        </a>
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<footer style="margin-top: -8rem;" class="footer footer-purple relative pt-100" id="footer">
    <canvas id="footer-dots"></canvas>
    <div class="container text-center">
        <script type="text/javascript"
            src="//rf.revolvermaps.com/0/0/8.js?i=51nrmfkj4iw&amp;m=0&amp;c=ff0000&amp;cr1=ffffff&amp;f=arial&amp;l=33"
            async="async"></script>
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12">
                <div class="section-heading text-center">
                    <h4 class="sub-title text-uppercase wow fadeInUp fw-bolder">CONTACT</h6>
                        <h2 class="title wow fadeInUp">Get In Touch</h2>
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
                        <span class="contact-icon"><img src="images/mail.png" alt="Mail Icon"></span>
                        <a href="/cdn-cgi/l/email-protection#e68f888089a6839e878b968a83c885898b"><span
                                class="__cf_email__"
                                data-cfemail="533a3d353c13362b323e233f367d303c3e">Infosuinternational60@gmail.com</span></a>
                    </li>
                    <li>
                        <span class="contact-icon"><img src="images/phone.png" alt="Phone Icon"></span>
                        <a href="tel:+92324-1595860">(+92) 324-1595860</a>
                    </li>
                    <li>
                        <span class="contact-icon"><img src="images/map-icon-3.png" alt="Telegram Icon"></span>
                        <a href="#">Lahore, Karachi, Islamabad, Jhang</a>
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
@endsection
