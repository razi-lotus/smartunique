@extends('layouts.homelayout')

@section('content')
    <main class="main">
        <!-- purple class was assinged to this section -->
        <section class="features bg-transparent ptb-100 overflow-h">
            <div class="container ptb-100 ptb-0 relative">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 relative z-index-1">
                        <div class="section-heading text-center">
                            <!-- <h6 class="sub-title text-uppercase wow fadeInUp">What is Smart Unique Int</h6> -->
                            <h2 style="color:#23257c !important;" class="title wow fadeInUp mt-md-4 mt-5 pt-md-0 pt-4">
                                Rewards
                            </h2>
                            <!-- <p class="wow fadeInUp">A happy life is one spent in learning, earning and yearning</p> -->
                        </div>
                    </div>
                </div>
                <div class="row relative z-index-1">
                    <div class="col-lg-3 wow fadeInRight order-md-first order-last">
                        <div class="mission-content d-flex flex-column justify-content-center align-items-center">
                            <!-- <h3 class="mission-title">Working Bonus</h3> -->
                            <img class="rounded-3" height="250" width="250" src="{{ asset('home/images/laptops.jpg') }}"
                                class="relative z-index-1" alt="Works Image">
                            <div class="token-details token-details-2">
                                <!-- <p class="mb-0">A bonus is a financial compensation that the company gives for good
                                    performance.
                                </p> -->
                                <ul class="">
                                    <li>If you earn <strong>2,36,000</strong> in <strong>3</strong> months, you will
                                        receive a laptop.

                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 wow fadeInRight order-md-first order-last">
                        <div class="mission-content d-flex flex-column justify-content-center align-items-center">
                            <!-- <h3 class="mission-title">Working Bonus</h3> -->
                            <img class="rounded-3" height="250" width="250" src="{{ asset('home/images/iphone.png') }}"
                                class="relative z-index-1" alt="Works Image">
                            <div class="token-details token-details-2">
                                <!-- <p class="mb-0">A bonus is a financial compensation that the company gives for good
                                                        performance.
                                                    </p> -->
                                <ul class="">
                                    <li>If you earn <strong>5,00000</strong> in <strong>5</strong> months, you will
                                        receive an iPhone.

                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 wow fadeInRight order-md-first order-last">
                        <div class="mission-content d-flex flex-column justify-content-center align-items-center">
                            <!-- <h3 class="mission-title">Working Bonus</h3> -->
                            <img class="rounded-3" height="250" width="340" src="{{ asset('home/images/bike.jpg') }}"
                                class="relative z-index-1" alt="Works Image">
                            <div class="token-details token-details-2">
                                <!-- <p class="mb-0">A bonus is a financial compensation that the company gives for good
                                                        performance.
                                                    </p> -->
                                <ul class="">
                                    <li>If you earn <strong>7,00000</strong> in <strong>7</strong> months, you will
                                        receive a Honda Bike.

                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 wow fadeInRight order-md-first order-last">
                        <div class="mission-content d-flex flex-column justify-content-center align-items-center">
                            <!-- <h3 class="mission-title">Working Bonus</h3> -->
                            <img class="rounded-3 mt-md-5 res-height" height="200" width="280" src="{{ asset('home/images/tour.jpg') }}"
                                alt="Works Image">
                            <div class="token-details token-details-2">
                                <!-- <p class="mb-0">A bonus is a financial compensation that the company gives for good
                                                        performance.
                                                    </p> -->
                                <ul class="tour">
                                    <li>If you earn <strong>10,00000</strong> in <strong>12</strong> months, you will
                                        Dubai Tour.
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
