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
          <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
          <li class="breadcrumb-item active">Balance Transfer History</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

            <!-- Customers Card -->
            <div class="col-xxl-4 col-xl-12">
                <div class="card">
                    <div class="card-body">
                      <h5 class="card-title">Balance History</h5>
                      <!-- Recent Sales -->
                      <div class="alert alert-msg"></div>
                      <div class="col-12">
                        <div class="recent-sales overflow-auto">
                          <table class="table table-borderless" id="balance-datatable">
                            <thead>
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">User</th>
                                <th scope="col">Amount$</th>
                                <th scope="col">Status</th>
                              </tr>
                            </thead>
                            <tbody>
                            </tbody>
                          </table>
                        </div>
                      </div><!-- End Recent Sales -->
                    </div>
                  </div>
            </div><!-- End Customers Card -->

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
        $(document).ready(function(){
            $("#show-add-blnce").click(function(){
                $("#show-add-blnce-form").slideToggle();
            });
        });
        $(document).ready(function(){
            var tableData =   $('#balance-datatable').DataTable({
                "order": [],
                "ordering": 1,
                "columnDefs": [
                    { orderable: false, targets: [-1] },
                ],
                "oLanguage": {
                    "sZeroRecords": "No records found"
                },
                "pagination":[
                    { "pageLength": 50  },
                    { "total": 50,  }
                ],
                "serverSide": true,
                "autoWidth": false,
                "ajax": {
                    "url": "{{ url('admin/user-balance-listing') }}",
                    "dataType": "json",
                    "type": "GET",
                },
                "columns": [
                    { "data": "id" },
                    { "data": "name" },
                    { "data": "amount" },
                    { "data": "status" },
                ],
            });


            $('#balance-add').on('click',function(event){
                event.preventDefault();
                // $('#exampleModalCenter').modal('show');
                // return;
                if(confirm('Are you sure you want to transfer this amount?')){
                    let user_id     = $('#inputUserId').val();
                    var amount      = $('#inputAmount').val();
                    if(user_id === 'not-selected'){
                        $('.id-error').text('Select user name');
                        return;
                    }
                    $.ajax({
                    url:'{{ url("admin/add/user/balance") }}',
                    type:'post',
                    data:{
                        _token  : "{{ csrf_token() }}",
                        user_id : user_id,
                        amount  : amount,
                    },
                    success:function(data){
                        console.log(data,'ddd');
                        if(data.success == 'Balance transfered successfully'){
                            $('.amount-tag').text(data.balance.total);
                            $("#show-add-blnce-form").hide();
                            $('#inputAmount').val('');
                            $('.alert-msg').addClass('alert-success');
                            $('.alert-msg').text('Balance trasfered successfully.');
                            tableData.ajax.reload();
                          }else{
                              $('.alert-msg').addClass('alert-danger');
                              $('.alert-msg').text('Insufficient balance, you can not transfer amount.');
                          }
                        }
                      });
                  }
                });

            $('.closs-modal').on('click',function(){
                $('#exampleModalCenter').modal('hide');
            });
        });

    </script>
@endpush
<style>
    #balance-datatable_filter{
        display: none !important;
    }
    #balance-datatable_length{
        display: none !important;
    }
    #balance-datatable_info{
        display: none !important;
    }
    #balance-datatable_paginate{

    }
</style>
