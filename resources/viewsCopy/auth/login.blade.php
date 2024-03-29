@extends('layouts.app')
@section('content')
    <div style="background-image: url(/img/abstract-security-technology-background_52530-21.jpg); background-size: cover; background-position: center; background-repeat: no-repeat" class="container">
        <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
            <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                <div class="d-flex justify-content-center py-4 d-none">
                <a href="index.html" class="logo d-flex align-items-center w-auto">
                    <img src="/img/stock-logo.png" alt="">
                    <span class="">SmartUniqueInt</span>
                </a>
                </div><!-- End Logo -->

                <div class="card mb-3">

                <div class="card-body">

                    <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                    <p class="text-center small">Enter your username & password to login</p>
                    </div>

                    <form class="row g-3 needs-validation" method="POST" action="{{ route('login') }}">
                        @csrf
                    <div class="col-12">
                        <label for="yourEmail" class="form-label">User Id</label>
                        <input type="text" name="uuid" class="form-control" id="yourEmail" required>
                        @if(Session::has('status'))
                            <div class="text-danger">{{ Session::get('status') }}</div>
                        @endif
                    </div>

                    <div class="col-12">
                        <label for="yourPassword" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="yourPassword" required>
                        <div class="invalid-feedback">Please enter your password!</div>
                    </div>

                    <div class="col-12">
                        <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
                        <label class="form-check-label" for="rememberMe">Remember me</label>
                        </div>
                    </div>
                    <div class="col-12">
                        <button class="btn btn-primary w-100" type="submit">Login</button>
                    </div>
                    <div class="col-12">
                        <p class="small mb-0">Don't have account? <a href="{{ route('register') }}">Create an account</a></p>
                    </div>
                    </form>

                </div>
                </div>

                <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://///license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https:///////-/// -->
                <!-- Designed by <a href="https://///">BootstrapMade</a> -->
                </div>

            </div>
            </div>
        </div>

        </section>
  </div>
@endsection
