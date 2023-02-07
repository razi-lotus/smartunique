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
                    <div class="card-body">
                        <div class="pt-4 animText">
                            <strong class="text-center">Congrats your account has been Successfully registered.</strong>
                            <br/>
                        </div>
                        <div class="col-12 container text-center animText">
                            <h6 style="color: red;">Your login detail has been sent at your email.</h6>
                            <a href="{{ route('home') }}">Go to home</a>
                        </div>
                        <div class="d-flex justify-content-center py-4 animImg">
                            <img src="{{ asset('/img/welcomeEmail.webp') }}" width="250" height="250">
                        </div><!-- End Logo -->
                        <div class="mb-3">
                        </div>
                    </div>
                </div>
            </div>
        </div>  
    </section>
</div>
@endsection
<style>
.animImg {
  position: relative;
  animation: mymove 6s linear;
  top:0px;
}
@keyframes mymove {
  from {top: -160px;}
  to {top: 0px;}
}
.animText{
    display: block;
    -webkit-animation: fadeOut 12s;
    animation: fadeOut 12s;
    animation-fill-mode: forwards;
}
@-webkit-keyframes fadeOut {
    0% { opacity: 0;}
    100% { opacity: 1;}
}  
@keyframes fadeOut {
    0% { opacity: 0;}
    100% { opacity: 1;}
}
</style>
