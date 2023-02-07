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
            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-4">
              <div class="card info-card revenue-card">

                <div class="card-body">
                  <h5 class="card-title">Earning</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-currency-dollar"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{ $balances ? $balances->total : 0 }}</h6>
                      {{-- <span class="text-success small pt-1 fw-bold">12%</span> --}}
                      <span>Total Earned Income</span>
                       <span class="text-success small pt-2 ps-1">{{ $totalEarnedIncome }}$</span>
                    </div>
                  </div>
                </div>

              </div>
            </div>
            <div class="col-xxl-4 col-md-4">
              <div class="card info-card customers-card">

                <div class="card-body">
                  <h5 class="card-title">Points</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-currency-dollar"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{ count($points) }}</h6>
                      {{-- <span class="text-success small pt-1 fw-bold">12%</span> --}}
                      <span class="text-success small pt-2 ps-1">Earned Points</span>

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
                      <span class="text-success small pt-2 ps-1">Earned Bonus</span>

                    </div>
                  </div>
                </div>

              </div>
            </div>
            <div class="col-xxl-4 col-md-4">
            <div class="card">
            <div class="card-body">
                  <h5 class="card-title">Reports <span>/Today</span></h5>

              <!-- Column Chart -->
              <div id="columnChart"></div>

              <script>
                document.addEventListener("DOMContentLoaded", () => {
                  new ApexCharts(document.querySelector("#columnChart"), {
                    series: [{
                      name: 'Net Profit',
                      data: [44, 55, 57, 56, 61, 58, 63, 60, 66]
                    }, {
                      name: 'Revenue',
                      data: [76, 85, 101, 98, 87, 105, 91, 114, 94]
                    }, {
                      name: 'Free Cash Flow',
                      data: [35, 41, 36, 26, 45, 48, 52, 53, 41]
                    }],
                    chart: {
                      type: 'bar',
                      height: 350
                    },
                    plotOptions: {
                      bar: {
                        horizontal: false,
                        columnWidth: '55%',
                        endingShape: 'rounded'
                      },
                    },
                    dataLabels: {
                      enabled: false
                    },
                    stroke: {
                      show: true,
                      width: 2,
                      colors: ['transparent']
                    },
                    xaxis: {
                      categories: ['Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct'],
                    },
                    yaxis: {
                      title: {
                        text: '$ (thousands)'
                      }
                    },
                    fill: {
                      opacity: 1
                    },
                    tooltip: {
                      y: {
                        formatter: function (val) {
                          return "$ " + val + " thousands"
                        }
                      }
                    }
                  }).render();
                });
              </script>
              <!-- End Column Chart -->

            </div>
            </div>
            <div class="card">
            <div class="card-body pb-0">
              <h5 class="card-title">Website Traffic <span>| Today</span></h5>

              <div id="trafficChart" style="min-height: 400px;" class="echart"></div>

              <script>
                document.addEventListener("DOMContentLoaded", () => {
                  echarts.init(document.querySelector("#trafficChart")).setOption({
                    tooltip: {
                      trigger: 'item'
                    },
                    legend: {
                      top: '5%',
                      left: 'center'
                    },
                    series: [{
                      name: 'Access From',
                      type: 'pie',
                      radius: ['40%', '70%'],
                      avoidLabelOverlap: false,
                      label: {
                        show: false,
                        position: 'center'
                      },
                      emphasis: {
                        label: {
                          show: true,
                          fontSize: '18',
                          fontWeight: 'bold'
                        }
                      },
                      labelLine: {
                        show: false
                      },
                      data: [{
                        value: 1048,
                        name: 'Search Engine'
                      },
                      {
                        value: 735,
                        name: 'Direct'
                      },
                      {
                        value: 580,
                        name: 'Email'
                      },
                      {
                        value: 484,
                        name: 'Union Ads'
                      },
                      {
                        value: 300,
                        name: 'Video Ads'
                      }
                      ]
                    }]
                  });
                });
              </script>

            </div>
            </div>
          </div>
            <div class="col-xxl-12 col-md-4">
              <div class="card info-card sales-card px-3 pb-3">
                <div class="alert-msg alert alert-danger mt-2 d-none"></div>
                <div class="alert-msg-upgde alert alert-success mt-2 d-none">Account upgraded successfully</div>
                <div class="row pt-3">
                <div class="col-xxl-6 col-md-6 col-sm-12 mt-2 mb-4">
                  <select name="account-updrade" class="form-control level-select">
                    <option>Select Account to Upgrade</option>
                      @if (!$currentLevel && $balances && $balances->total >= 50)
                        <option value="level-1">Member Distributor Account <b>50$ level 1</b></option>
                      @elseif ($currentLevel)
                        <option>Member Distributor Account <b>50$ level 1</b></option>
                      @elseif (!$currentLevel && $balances && $balances->total < 50)
                        <option disabled>Member Distributor Account <b>50$ level 1</b></option>
                      @else
                        <option disabled>Member Distributor Account <b>50$ level 1</b></option>
                      @endif
  
                      @if ($currentLevel && $currentLevel->levelName->name == 'Member' && $balances && $balances->total >= 25)
                          <option value="level-2">Supervisor Distributor Account <b>75$ level 2</b></option>
                        @elseif ($currentLevel && $currentLevel->levelName->id <= 3)
                          <option>Supervisor Distributor Account <b>75$ level 2</b></option>
                        @elseif ($currentLevel && $currentLevel->levelName->id > 3)
                          <option disabled>Supervisor Distributor Account <b>75$ level 2</b></option>
                        @elseif (!$currentLevel && $balances && $balances->total >= 75)
                          <option value="level-2">Supervisor Distributor Account <b>75$ level 2</b></option>
                        @elseif ($currentLevel && $balances && $balances->total >= 75)
                          <option value="level-2">Supervisor Distributor Account <b>75$ level 2</b></option>
                      @else
                        <option disabled>Supervisor Distributor Account <b>75$ level 2</b></option>
                      @endif
  
                      @if ($currentLevel && $currentLevel->levelName->name == 'Supervisor' && $balances && $balances->total >= 25)
                          <option value="level-3">Manager Distributor Account <b>100$ level 3</b></option>
                        @elseif ($currentLevel && $currentLevel->levelName->id <= 2)
                          <option>Manager Distributor Account <b>100$ level 3</b></option>
                        {{-- @elseif ($currentLevel && $currentLevel->levelName->id > 2)
                          <option disabled>Manager Distributor Account <b>100$ level 3</b></option> --}}
                        @elseif (!$currentLevel && $balances && $balances->total >= 100)
                          <option value="level-3">Manager Distributor Account <b>100$ level 3</b></option>
                        @elseif ($currentLevel && $balances && $balances->total >= 50)
                          <option value="level-3">Manager Distributor Account <b>100$ level 3</b></option>
                      @else
                          <option disabled>Manager Distributor Account <b>100$ level 3</b></option>
                      @endif
  
                      @if ($currentLevel && $currentLevel->levelName->name == 'Manager' && $balances && $balances->total >= 50)
                          <option value="level-4">Director Distributor Accou\\
                            nt <b>150$ level 4</b></option>
                        @elseif ($currentLevel && $currentLevel->levelName->id <= 1)
                          <option>Director Distributor Account <b>150$ level 4</b></option>
                        {{-- @elseif ($currentLevel && $currentLevel->levelName->id > 1)
                          <option disabled>Director Distributor Account <b>150$ level 4</b></option> --}}
                        @elseif (!$currentLevel && $balances && $balances->total >= 150)
                          <option value="level-4">Director Distributor Account <b>150$ level 4</b></option>
                        @elseif ($currentLevel && $balances && $balances->total >= 100)
                          <option value="level-4">Director Distributor Account <b>150$ level 4</b></option>
                      @else
                        <option disabled>Director Distributor Account <b>150$ level 4</b></option>
                      @endif
                  </select>
               </div>
                {{-- {{ $currentLevel->levelName->name }} --}}
                {{-- <div class="col-xxl-6 col-md-6 col-sm-12 mt-2 mb-4"> --}}
                  <div class="col-xxl-6 col-md-6 col-sm-12 col-12 mt-2 mb-4">Current Account: <strong>{{ $currentLevel && $currentLevel->levelName ? $currentLevel->levelName->name : '' }}</strong></div>
                  @if ($currentLevel && $currentLevel->levelName->id !== 1)
                      <div class="col-xxl-6 col-md-6 col-sm-12 col-12">
                          @if (!$currentLevel && $balances && $balances->total >= 50)
                              <button class="btn btn-sm btn-success" id="user-upgrade-account">Upgrade Account</button>
                          @elseif ($currentLevel && $balances && $balances->total >= 25)
                              <button class="btn btn-sm btn-success" id="user-upgrade-account">Upgrade Account</button>
                          @elseif($currentLevel && $balances && $balances->total < 25)
                              <button class="btn btn-sm btn-danger" id="user-upgrade-account" disabled>Upgrade Account</button>
                          @endif
                      </div>
                      @elseif (!$currentLevel)
                      <div class="col-xxl-6 col-md-6 col-sm-12 col-12">
                          @if (!$currentLevel && $balances && $balances->total >= 50)
                              <button class="btn btn-sm btn-success" id="user-upgrade-account">Upgrade Account</button>
                          @elseif ($currentLevel && $balances && $balances->total > 25)
                              <button class="btn btn-sm btn-success" id="user-upgrade-account">Upgrade Account</button>
                          @else
                              <button class="btn btn-sm btn-danger" id="user-upgrade-account" disabled>Upgrade Account</button>
                          @endif
                      </div>
                  @endif
                {{-- </div> --}}
              </div>
            </div>
            </div>
          </div>
            @if (!$currentLevel)
              <div class="col-xxl-6 col-md-6 col-sm-12 mt-2 mb-4">
                <p class="alert alert-danger"><strong>Warning!</strong> Please upgrade your account to continue work</p>
              </div>
            @endif

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
            // alert($('.level-select :selected').val())
            var level = $('.level-select :selected').val();
            // return;
            // alert($(this));
            if(1){
              $.ajax({
                  url:'{{ url("admin/user-upgrade-account") }}',
                  type:'post',
                  data : {
                    _token  : "{{ csrf_token() }}",
                    'level' : level
                  },
                  success:function(data){
                    console.log(data,'data')
                    $('.alert-msg-upgde').removeClass('d-none');
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
