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
                            <div class="alert alert-msg d-none"></div>
                          <h5 class="card-title">
                            <button type="button" class="btn btn-sm btn-primary float-end" id="show-add-blnce">Add Balance</button>
                          </h5>
                          <div class="row" id="show-add-blnce-form">
                            {{-- {{ route('admin.add.balance') }} --}}
                            <form method="POST" action="" class="row">
                                @csrf
                                <div class="col-12">
                                    <label for="user" class="form-label">Enter User Id</label>
                                    <input id="inputUserId" name="user_id" class="form-control">
                                    {{-- <select id="inputUserId" name="user_id" class="form-select">
                                        <option value="not-selected">select user</option>
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}">{{ $user->uuid }}</option>
                                        @endforeach
                                    </select> --}}
                                    <span class="id-error" style="color: red"></span>
                                </div>
                                <div class="col-12">
                                    <label for="inputNanme4" class="form-label">Amount$</label>
                                    <input type="text" class="form-control" name="amount" id="inputAmount">
                                </div>
                                {{-- <div class="col-3">
                                    <label for="inputNanme4" class="form-label">Acount Name</label>
                                    <select class="form-control" name="acc_title" id="inputAccount">
                                        <option value="1">Director</option>
                                        <option value="2">Manager</option>
                                        <option value="3">Supervisor</option>
                                        <option value="4">Member</option>
                                    </select>
                                </div>
                                <div class="col-3">
                                    <label for="" class="form-label">Acount Type</label>
                                    <select class="form-control" name="acc_type" id="inputAccounttype">
                                        <option value="Account Purchase">Account Purchase</option>
                                        <option value="Upgrade Account">Upgrade Account</option>
                                    </select>
                                </div> --}}
                                <div class="col-4 mt-3">
                                    <button type="submit" class="btn btn-sm btn-primary" id="balance-add">Submit</button>
                                </div>
                            </form>
                          </div>
                          <br/><br/>
                          <table style="margin-top: 15px" class="table table-borderless" id="balance-datatable">
                            <thead style="font-size: 12px">
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">User</th>
                                <th scope="col">Amount$</th>
                                <th scope="col">Income Type</th>
                                <th scope="col">Status</th>
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



        <!-- Modal -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="row">
                        <div class="col-12 text-center">
                            <a href="javascript:void(0);" class="logo d-flex align-items-center text-center" style="padding-left: 115px;">
                                <img src="{{ asset('img/stock-logo.png') }}" alt="">
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
                    { "pageLength": 10  },
                    { "total": 50,  }
                ],
                "serverSide": true,
                "autoWidth": false,
                "ajax": {
                    "url": "{{ url('admin/balance-listing') }}",
                    "dataType": "json",
                    "type": "GET",
                },
                "columns": [
                    { "data": "id" },
                    { "data": "name" },
                    { "data": "amount" },
                    { "data": "income_type" },
                    { "data": "status" },
                    // { "data": "action" },
                ],
            });

            $('#balance-add').on('click',function(event){
                event.preventDefault();
                // $('#exampleModalCenter').modal('show');
                // return;
                let user_id     = $('#inputUserId').val();
                var userName    = $('#inputUserId :selected').text();
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
                },
                success:function(data){
                    console.log(data.error,'ddd');
                    if(data.success){
                        $('.alert-msg').removeClass('d-none');
                        $('.alert-msg').removeClass('alert-danger');
                        $('.alert-msg').addClass('alert-success');
                        $('.alert-msg').text('Balance transfered successfully.');
                    }else if(data.error){
                        $('.alert-msg').removeClass('d-none');
                        $('.alert-msg').removeClass('alert-success');
                        $('.alert-msg').addClass('alert-danger');
                        $('.alert-msg').text('Invalid user id.');
                    }
                    // $('.amount-tag').text(amount);
                    // $('.user-tag').text(userName);
                    // $('#exampleModalCenter').modal('show');
                    // $("#show-add-blnce-form").hide();
                    $('#inputUserId').val('');
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
