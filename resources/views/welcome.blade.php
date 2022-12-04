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
                <a href="javascript:void(0);" class="logo d-flex align-items-center w-auto">
                    <img src="{{ asset('/img/logo.png') }}" alt="">
                    <span class="d-none d-lg-block">Welcome to SmartUniqueInt</span>
                </a>
                </div><!-- End Logo -->

                <div class="mb-3">

                <div class="card-body">

                    <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Hi <strong class="text-capitalize">{{ Auth::user()->name }}</strong></h5>
                    <p class="text-center small">Please upgrade your account to go on dashboard</p>
                    {{-- <p class="text-center small">Account Name is {{ Auth::user()->pet_name }}</p> --}}
                    @if (Auth::user()->acc_request == 0)
                    <form action="{{ route('admin.upgrade.account') }}" method="POST">
                        @csrf
                        <p class="text-center">
                            <button type="submit" class="btn btn-sm btn-primary mx-auto" id="upgrade-acc">Upgrade</button>
                        </p>
                    </form>
                    @endif
                </div>
                    <div class=""></div>
                </div>
                </div>

            </div>
            </div>
        </div>

        </section>
  </div>
@endsection
