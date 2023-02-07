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

            <!-- Customers Card -->
            <div class="col-xxl-4 col-xl-12">
                <div class="card">
                    <div class="card-body">
                      <h5 class="card-title">All Balance</h5>
                      <!-- Recent Sales -->
                      <div class="col-12">
                        <div class="recent-sales overflow-auto">
                          <br/><br/>
                          <table style="margin-top: 15px" class="table table-borderless" id="balance-datatable">
                            <thead style="font-size: 12px">
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">User</th>
                                <th scope="col">Amount</th>
                                {{-- <th scope="col">Action</th> --}}
                              </tr>
                            </thead>
                            <tbody style="font-size: 12px">
                            </tbody>
                          </table>
                        </div>
                      </div><!-- End Recent Sales -->
                    </div>
                  </div>
            </div><!-- End Customers Card -->

          </div>
        </div><!-- End Left side columns -->

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

        $("#show-add-blnce-form").hide();
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
                    "url": "{{ url('admin/user-bonus-listing') }}",
                    "dataType": "json",
                    "type": "GET",
                },
                "columns": [
                    { "data": "id" },
                    { "data": "name" },
                    { "data": "amount" },
                    // { "data": "action" },
                ],
            });

            $('#balance-add').on('click',function(event){
                event.preventDefault();
                // $('#exampleModalCenter').modal('show');
                // return;
                let user_id     = $('#inputUserId').val();
                var userName    = $('#inputUserId :selected').text();
                var accName    = $('#inputAccount :selected').val();
                var amount      = $('#inputAmount').val();
                var accType    = $('#inputAccounttype :selected').val();
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
                    acc_id:accName,
                    acc_type:accType
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
        display: none !important;
    }
</style>

