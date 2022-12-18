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
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        {{-- <div class="col-lg-12"> --}}
          <div class="row">
            <div class="card info-card sales-card">
              <div class="alert-msg alert alert-danger mt-2 d-none"></div>
              <div class="row pt-3">
            <div class="col-xxl-6 col-md-6 col-sm-12 mt-2 mb-4">
              <select name="account-updrade" class="form-control">
                <option>Select account to upgrade</option>
                <option {{ $balances && $balances->total >= 50 ? '' : 'disabled' }}>Member Distributor Account</option>
                <option {{ $balances && $balances->total >= 75 ? '' : 'disabled' }}>Supervisor Distributor Account</option>
                <option {{ $balances && $balances->total >= 100 ? '' : 'disabled' }}>Manager Distributor Account</option>
                <option {{ $balances && $balances->total >= 150 ? '' : 'disabled' }}>Director Distributor Account</option>
              </select>
            </div>
            <div class="col-xxl-6 col-md-6 col-sm-12 mt-2 mb-4">
              <span>Current Account: <strong>{{ $currentLevel && $currentLevel->levelName ? $currentLevel->levelName->name : '' }}</strong></span>
              <button class="btn btn-sm btn-primary float-end" id="user-upgrade-account" {{ $currentLevel && $currentLevel->levelName->name == 'Director' ? 'disabled' : '' }}>Upgrade Account</button>
            </div>
          </div>
          </div>
            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-4">
              <div class="card info-card sales-card">

                <div class="card-body">
                  <h5 class="card-title">Balance</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-currency-dollar"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{ $balances ? $balances->total : 0 }}</h6>
                      {{-- <span class="text-success small pt-1 fw-bold">12%</span> --}}
                      <span class="text-muted small pt-2 ps-1">Earned Income</span>

                    </div>
                  </div>
                </div>

              </div>
            </div>
            <div class="col-xxl-4 col-md-4">
              <div class="card info-card sales-card">

                <div class="card-body">
                  <h5 class="card-title">Points</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-currency-dollar"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{ count($points) }}</h6>
                      {{-- <span class="text-success small pt-1 fw-bold">12%</span> --}}
                      <span class="text-muted small pt-2 ps-1">Earned Points</span>

                    </div>
                  </div>
                </div>

              </div>
            </div>
            <div class="col-xxl-4 col-md-4">
              <div class="card info-card sales-card">

                <div class="card-body">
                  <h5 class="card-title">Bonuses</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-currency-dollar"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{ $bonus | 0 }}</h6>
                      {{-- <span class="text-success small pt-1 fw-bold">12%</span> --}}
                      <span class="text-muted small pt-2 ps-1">Earned Bonus</span>

                    </div>
                  </div>
                </div>

              </div>
            </div>
            <div class="col-xxl-4 col-xl-12">
                <div class="card">
                    {{-- <div class="card-body">
                      <h5 class="card-title">Balance Transfer</h5>
                      <!-- Recent Sales -->
                      <div class="col-12">
                        <div class="recent-sales overflow-auto">
                        </div>
                      </div><!-- End Recent Sales -->
                    </div> --}}
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
      $(document).ready(function(){
        $('#user-upgrade-account').on('click',function(e){

            // alert($(this));
            if(confirm('Are you sure you want to upgrade your account?')){
              $.ajax({
                  url:'{{ url("admin/user-upgrade-account") }}',
                  type:'get',
                  success:function(data){
                    console.log(data,'data')
                    if(data.error == 'Not eligible'){
                      $('.alert-msg').removeClass('d-none');
                      $('.alert-msg').text('You are not eligible to upgrade account.');
                    }
                  }
              });
            }
        });
        });

    </script>
@endpush
