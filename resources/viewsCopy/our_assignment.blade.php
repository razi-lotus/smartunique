@extends('layouts.homelayout')

@section('content')

<main class="main">
        <!-- purple class was assinged to this section -->
        <!-- res-mt-n15 -->
        <section class="features bg-transparent ptb-100 overflow-h">
            <div class="container ptb-100 ptb-0 relative">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 relative z-index-1">
                        <div class="section-heading text-center">
                            <!-- <h6 class="sub-title text-uppercase wow fadeInUp">What is Smart Unique Int</h6> -->
                            <h2 style="color:#23257c !important;" class="title wow fadeInUp mt-md-4 mt-5 pt-md-0 pt-4">
                                My Assignment
                            </h2>
                            <!-- <p class="wow fadeInUp">A happy life is one spent in learning, earning and yearning</p> -->
                        </div>
                    </div>
                </div>
                <div class="row relative z-index-1">
                    <div class="col-lg-6 col-md-12 wow fadeInRight order-md-first order-last">
                        <div class="mission-content">
                            <!-- <h3 class="mission-title">Assignment</h3> -->
                            <div class="token-details">
                                <p class="mb-0">Data entry is simply the transcription of data from one form into
                                    another.
                                    No particular skill is required to do it. We are providing an opportunity for our
                                    employees to generate extra earnings by doing this task.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 order-md-last order-first">
                        <div class="row ms-md-5">
                            <div class="col-12 feature-box wow fadeInUp">
                                <img class="rounded-3 res-how" height="350" src="{{ asset('home/images/assignment.jpg') }}"
                                    class="relative z-index-1" alt="Works Image">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row relative z-index-1 mt-md-5">
                    <div class="col-lg-6 order-first">
                        <img class="rounded-3" height="350" src="{{ asset('home/images/assignment2.jpg') }}" class="" alt="Works Image">
                    </div>
                    <div class="col-lg-6 col-md-12 wow fadeInRight order-last">
                        <div class="mission-content">
                            <!-- <h3 class="mission-title">Assignment</h3> -->
                            <div class="token-details">
                                <p>You just need to copy and
                                    paste the given data on your account and share links on social sites. You will get
                                    paid for every view on your links. For each click on your links, you will be
                                    compensated. Your income is based on views. You should have a mobile, internet
                                    connection, and free time to start.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
