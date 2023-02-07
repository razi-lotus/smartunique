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
        <div class="col-lg-12">
          <div class="row">

            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-4">
              <div class="card info-card sales-card">
                <div class="card-body">
                  <h5 class="card-title">Users</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-person"></i>
                    </div>
                    <div class="ps-3">
                      <h6 class="active-user">0</h6>
                      {{-- <span class="text-success small pt-1 fw-bold">12%</span>  --}}
                      <span
                        class="text-muted small pt-2 ps-1">Active</span>

                    </div>
                  </div>
                </div>

              </div>
            </div>
            <div class="col-xxl-4 col-md-4">
              <div class="card info-card sales-card">
                <div class="card-body">
                  <h5 class="card-title">Users</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-person"></i>
                    </div>
                    <div class="ps-3">
                      <h6 class="pending-user">0</h6>
                      <span class="text-muted small pt-2 ps-1">Pending</span>

                    </div>
                  </div>
                </div>

              </div>
            </div>
            <div class="col-xxl-4 col-md-4">
              <div class="card info-card sales-card">
                <div class="card-body">
                  <h5 class="card-title">Users</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-person"></i>
                    </div>
                    <div class="ps-3">
                      <h6 class="inactive-user">0</h6>
                      {{-- <span class="text-success small pt-1 fw-bold">12%</span>  --}}
                      <span
                        class="text-muted small pt-2 ps-1">InActive</span>

                    </div>
                  </div>
                </div>

              </div>
            </div>
            <div class="col-xxl-4 col-md-4">
              <div class="card info-card sales-card">
                <div class="card-body">
                  <h5 class="card-title">Director Accounts</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-person"></i>
                    </div>
                    <div class="ps-3">
                      <h6 class="level1-user">0</h6>
                      {{-- <span class="text-success small pt-1 fw-bold">12%</span>  --}}
                      <span
                        class="text-muted small pt-2 ps-1">1st Level</span>

                    </div>
                  </div>
                </div>

              </div>
            </div>
            <div class="col-xxl-4 col-md-4">
              <div class="card info-card sales-card">
                <div class="card-body">
                  <h5 class="card-title">Manager Accounts</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-person"></i>
                    </div>
                    <div class="ps-3">
                      <h6 class="level2-user">0</h6>
                      {{-- <span class="text-success small pt-1 fw-bold">12%</span>  --}}
                      <span
                        class="text-muted small pt-2 ps-1">2nd Level</span>

                    </div>
                  </div>
                </div>

              </div>
            </div>
            <div class="col-xxl-4 col-md-4">
              <div class="card info-card sales-card">
                <div class="card-body">
                  <h5 class="card-title">Supervisor Accounts</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-person"></i>
                    </div>
                    <div class="ps-3">
                      <h6 class="level3-user">0</h6>
                      {{-- <span class="text-success small pt-1 fw-bold">12%</span>  --}}
                      <span
                        class="text-muted small pt-2 ps-1">3rd Level</span>

                    </div>
                  </div>
                </div>

              </div>
            </div>
            <div class="col-xxl-4 col-md-4">
              <div class="card info-card sales-card">
                <div class="card-body">
                  <h5 class="card-title">Member Accounts</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-person"></i>
                    </div>
                    <div class="ps-3">
                      <h6 class="level4-user">0</h6>
                      {{-- <span class="text-success small pt-1 fw-bold">12%</span>  --}}
                      <span
                        class="text-muted small pt-2 ps-1">4th Level</span>

                    </div>
                  </div>
                </div>

              </div>
            </div>
            <div class="col-xxl-4 col-md-4">
              <div class="card info-card sales-card">
                <div class="card-body">
                  <h5 class="card-title">Users</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-person"></i>
                    </div>
                    <div class="ps-3">
                      <h6 class="today-reg-user">0</h6>
                      {{-- <span class="text-success small pt-1 fw-bold">12%</span>  --}}
                      <span
                        class="text-muted small pt-2 ps-1">Today Registered</span>

                    </div>
                  </div>
                </div>

              </div>
            </div>
            <div class="col-xxl-4 col-md-4">
              <div class="card info-card sales-card">
                <div class="card-body">
                  <h5 class="card-title">Accounts</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-person"></i>
                    </div>
                    <div class="ps-3">
                      <h6 class="today-upgraded-user">0</h6>
                      {{-- <span class="text-success small pt-1 fw-bold">12%</span>  --}}
                      <span
                        class="text-muted small pt-2 ps-1">Today Upgraded</span>

                    </div>
                  </div>
                </div>

              </div>
            </div>

            <!-- Customers Card -->
            {{-- <div class="col-xxl-4 col-xl-12">
                <div class="card">
                    <div class="card-body">
                      <h5 class="card-title">Balance Transfer</h5>
                      <!-- Recent Sales -->
                      <div class="col-12">
                        <div class="recent-sales overflow-auto">

                        </div>
                      </div><!-- End Recent Sales -->
                    </div>
                  </div>
            </div><!-- End Customers Card --> --}}

          </div>
        </div><!-- End Left side columns -->



        <!-- Modal -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="row">
                        <div class="col-12 text-center">
                            <a href="javascript:void(0);" class="logo d-flex align-items-center text-center" style="padding-left: 115px;">
                                <img src="{{ asset('img/logo.png') }}" alt="">
                                <span class="d-lg-block">SmartUniqueInt</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="modal-body">
                <strong class="amount-tag"></strong>$ transferred to <strong class="user-tag text-capitalize"></strong> succssfully.
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary closs-modal" data-dismiss="modal">Close</button>
                {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                </div>
            </div>
            </div>
        </div>

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
        setTimeout(() => {
            $.ajax({
                url:'{{ url("admin/get-users-status") }}',
                type:'get',
                // data:{
                //     _token  : "{{ csrf_token() }}",
                //     user_id : user_id,
                //     amount  : amount
                // },
                success:function(data){
                    console.log(data,'rssss');
                    $('.active-user').text(data.active);
                    $('.inactive-user').text(data.inActive);
                    $('.pending-user').text(data.pending);

                    $('.level1-user').text(data.level1);
                    $('.level2-user').text(data.level2);
                    $('.level3-user').text(data.level3);
                    $('.level4-user').text(data.level4);
                    $('.today-reg-user').text(data.today_reg);
                    $('.today-upgraded-user').text(data.today_upgraded);
                }
            });

        }, 2000);
        $("#show-add-blnce-form").hide();
        $(document).ready(function(){
            $("#show-add-blnce").click(function(){
                $("#show-add-blnce-form").slideToggle();
            });
        });
        $(document).ready(function(){

            $('#balance-add').on('click',function(event){
                event.preventDefault();
                // $('#exampleModalCenter').modal('show');
                // return;
                let user_id     = $('#inputUserId').val();
                var userName    = $('#inputUserId :selected').text();
                var accName    = $('#inputAccount :selected').val();
                var amount      = $('#inputAmount').val();
                if(user_id === 'not-selected'){
                    $('.id-error').text('Select user name');
                }
                $.ajax({
                url:'{{ url("admin/add/balance") }}',
                type:'post',
                data:{
                    _token  : "{{ csrf_token() }}",
                    user_id : user_id,
                    amount  : amount,
                    acc_id:accName
                },
                success:function(data){
                    console.log(data,'ddd');
                    $('.amount-tag').text(amount);
                    $('.user-tag').text(userName);
                    $('#exampleModalCenter').modal('show');
                    $("#show-add-blnce-form").hide();
                    $('#inputAmount').val('');
                    $('#inputAmount').val('');
                    tableData.ajax.reload();
                }
            });
        });

            $('.closs-modal').on('click',function(){
                $('#exampleModalCenter').modal('hide');
            });
        });

    </script>
@endpush
