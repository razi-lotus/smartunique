@extends('layouts.homelayout')

@section('content')
    <main class="main">

        <section class="features bg-transparent ptb-100 overflow-h">
            <div class="container ptb-100 ptb-0 relative">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 relative z-index-1">
                        <div class="section-heading text-center">
                            <!-- <h6 class="sub-title text-uppercase wow fadeInUp">What is Smart Unique Int</h6> -->
                            <h2 style="color:#23257c !important;" class="title wow fadeInUp mt-md-4 mt-5 pt-md-0 pt-4">
                                Withdraw Method
                            </h2>
                            <!-- <p class="wow fadeInUp">A happy life is one spent in learning, earning and yearning</p> -->
                        </div>
                    </div>
                </div>
                <div class="row relative z-index-1">
                    <div class="col-lg-6 col-md-12 wow fadeInRight order-md-first order-last">
                        <div class="mission-content">
                            <!-- <h3 class="mission-title">Working Bonus</h3> -->
                            <div class="token-details token-details-2">
                                <p class="mb-0">Send your earning to the company official account. You will receive
                                    your
                                    payment in any
                                    Bank account like
                                </p>
                                <ul class="mt-3">
                                    <li><strong>Easypaisa</strong></li>
                                    <li><strong>JazzCash</strong></li>
                                    <li><strong>Allied Bank</strong></li>
                                    <li><strong>HBL</strong></li>
                                    <li><strong>Meezan Bank</strong></li>
                                    <li><strong>UBL</strong></li>
                                </ul>
                                <p class="fw-bold text-start mt-4 mb-5 ms-2">
                                    etc.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 order-md-last order-first">
                        <div class="row ms-md-5">
                            <div class="col-12 feature-box wow fadeInUp">
                                <img class="rounded-3 m-auto" height="350" src="{{ asset('home/images/withdraw-method.jpg') }}"
                                    class="relative z-index-1" alt="Works Image">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
