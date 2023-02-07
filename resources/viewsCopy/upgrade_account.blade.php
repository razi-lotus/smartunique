@extends('layouts.app')
@section('content')
    @include('common.header')

  <!-- ======= Sidebar ======= -->
  @include('common.sidebar')
  <!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      {{-- <h1>Dashboard</h1> --}}
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Upgrade Account</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">
            <div class="col-xxl-4 col-xl-12">
                <div class="card">
                    @if ($upgradeAccRequest)
                    <div class="mb-3">
                        <div class="card-body">
                            <div class="pt-4 pb-2">
                            <h5 class="card-title text-center pb-0 fs-4">Hi <strong class="text-capitalize">{{ Auth::user()->name }}</strong></h5>
                            <p class="text-center small">Please upgrade your account to <strong>{{ $userLevel->levelName->name }}</strong></p>
                            {{-- <p class="text-center small">Account Name is {{ Auth::user()->pet_name }}</p> --}}
                            <form action="{{ route('admin.secondUpbradationRequest') }}" method="POST">
                                @csrf
                                <p class="text-center">
                                    <button type="submit" class="btn btn-sm btn-primary mx-auto" id="upgrade-acc">Upgrade</button>
                                </p>
                            </form>
                        </div>
                            <div class=""></div>
                        </div>
                        </div>
                    @else
                    <div class="mb-3">
                        <div class="card-body">
                            <div class="pt-4 pb-2">
                            <h5 class="card-title text-center pb-0 fs-4">Hi <strong class="text-capitalize">{{ Auth::user()->name }}</strong></h5>
                            <p class="text-center small">Sorry! You do not have any request to upgrade account.</strong></p>
                        </div>
                            <div class=""></div>
                        </div>
                        </div>
                    @endif
                  </div>
            </div><!-- End Customers Card -->

      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>SmartUniqueInt</span></strong>. All Rights Reserved
    </div>
  </footer>
@endsection

@push('scripts')
    <script>


    </script>
@endpush
