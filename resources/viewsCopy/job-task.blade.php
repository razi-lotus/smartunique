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
                                Job Task
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
                                <p class="mb-0">Assigned tasks are based on your qualifications. Qualifications are
                                    determined by
                                    assessments given during the registration process. You can select projects like
                                    advertising, digital Marketing, management, etc.
                                </p>
                                <p class="mt-3">All these can be done from home on
                                    your mobile, and a few can be done on your computer. You may choose your tasks, set
                                    your hours, and make your schedule. If You desire to earn a fixed income, do your
                                    work
                                    and get paid. If You perform 75% of your task, you will receive fix salary.

                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 order-md-last order-first">
                        <div class="row ms-md-5">
                            <div class="col-12 feature-box wow fadeInUp">
                                <img class="rounded-3 m-auto" height="350" src="{{ asset('home/images/job-task.jpg') }}"
                                    class="relative z-index-1" alt="Works Image">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row relative z-index-1 mt-md-5">
                    <div class="col-lg-6 order-first">
                        <img class="rounded-3" height="250" src="{{ asset('home/images/job-task2.jpg') }}" class="" alt="Works Image">
                    </div>
                    <div class="col-lg-6 col-md-12 wow fadeInRight order-last">
                        <div class="mission-content">
                            <!-- <h3 class="mission-title">Assignment</h3> -->
                            <div class="token-details">
                                <p>First you need to enroll in our paid online master session. During the session you
                                    can access any job task according to
                                    your plan/level.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
