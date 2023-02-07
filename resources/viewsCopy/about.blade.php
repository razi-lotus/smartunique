@extends('layouts.homelayout')

@section('content')
    <main class="main">
        <section class="bluish-purple relative overflow-h ptb-100">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12">
                        <div class="section-heading text-center">
                            <!-- <h6 class="sub-title text-uppercase wow fadeInUp">Token</h6> -->
                            <h2 class="title wow fadeInUp mt-md-4 mt-5 pt-md-0 pt-4 mb-4">About Us</h2>
                            <p class="wow fadeInUp">Smart U International is a digital earning platform. We are working
                                on various projects,
                                but our two major projects are advertising and digital marketing. We designed individual
                                learning and earning systems that helped you generate good income daily, weekly, and
                                monthly. We created this system to provide you with excellent and reliable income
                                sources.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section style="margin-top: -6rem;" class="pt-0 features bg-transparent overflow-h">
            <div class="container ptb-100 ptb-0 relative">
                <div class="row relative z-index-1">
                    <div class="col-lg-6 col-md-12 wow fadeInRight order-md-first order-last">
                        <div class="mission-content">
                            <!-- <h3 class="mission-title text-white">Assignment</h3> -->
                            <div class="token-details">
                                <p class="mb-0">Our objective is to make working from home more accessible, which is why
                                    we
                                    collect all original work-from-home jobs from around the web and post them on our
                                    website so you can simply locate suitable employment for you. We make it very
                                    simple by allowing you to search for work-from-home jobs based on the most recent
                                    searches and job categories (such as data entry jobs, ad posting, marketing,
                                    management, etc.). Candidates who wish to apply should complete the necessary
                                    Online Form.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 order-md-last order-first">
                        <div class="row ms-md-5">
                            <div class="col-12 feature-box wow fadeInUp">
                                <img class="rounded-3 res-how mt-5" height="350" src="{{ asset('home/images/pattern-3.jpg') }}"
                                    class="relative z-index-1" alt="Works Image">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
