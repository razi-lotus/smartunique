@extends('layouts.app')

@section('content')
    <div class="container">
        <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
            <div class="row justify-content-center">
            <div class="col-lg-12 col-md-12 d-flex flex-column align-items-center justify-content-center">
                @if (session('message'))
                <div class="alert alert-danger">
                    {{ session('message') }}
                </div>
                @endif
                <div class="d-flex justify-content-center py-4">
                    <img src="{{ asset('/img/welcomeEmail.webp') }}" width="250" height="250">
                </div><!-- End Logo -->

                <div class="mb-3">

                <div class="card-body">
                    <div class="pt-4 pb-2">
                    <p class="text-center small">Congrats your account has been Successfully registered.</p>
                    <p>Your login detail has been at your email.</p>
                </div>
                    <div class="">
                        <a href="{{ route('home') }}">Go to home</a>
                    </div>
                </div>
                </div>

            </div>
            </div>
        </div>

        </section>
  </div>
@endsection
