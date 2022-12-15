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
          <li class="breadcrumb-item active">Balance Transfer</li>
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
                      <h5 class="card-title">Total Balance</h5>
                      <span>{{ $balance !== null ? $balance->total : 0 }}</span>
                      <!-- Recent Sales -->
                      <div class="col-12">
                        <div class="recent-sales overflow-auto">

                          <h5 class="card-title">
                            <button type="button" class="btn btn-sm btn-primary float-end" id="show-add-blnce">Balance Transfer</button>
                          </h5>
                          <div class="row" id="show-add-blnce-form">
                            {{-- {{ route('admin.add.balance') }} --}}
                            <form method="POST" action="" class="row">
                                @csrf
                                <div class="col-3">
                                    <label for="user" class="form-label">User</label>
                                    <select id="inputUserId" name="user_id" class="form-select">
                                        <option value="not-selected">select user</option>
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}">{{ $user->uuid }}</option>
                                        @endforeach
                                    </select>
                                    <span class="id-error" style="color: red"></span>
                                </div>
                                <div class="col-3">
                                    <label for="inputNanme4" class="form-label">Amount</label>
                                    <input type="text" class="form-control" name="amount" id="inputAmount">
                                </div>
                                <div class="col-4 mt-3">
                                    <button type="submit" class="btn btn-sm btn-primary" id="balance-add">Submit</button>
                                </div>
                            </form>
                          </div>
                          <br/><br/>
                          <table class="table table-borderless" id="balance-datatable">
                            <thead>
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">User</th>
                                <th scope="col">Amount</th>
                                {{-- <th scope="col">Action</th> --}}
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
                    { "pageLength": 10  },
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
                    // { "data": "action" },
                ],
            });

            $('#balance-add').on('click',function(event){
                event.preventDefault();
                // $('#exampleModalCenter').modal('show');
                // return;
                let user_id     = $('#inputUserId').val();
                var amount      = $('#inputAmount').val();
                if(user_id === 'not-selected'){
                    $('.id-error').text('Select user name');
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
                    $('.amount-tag').text(amount);
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