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
          <li class="breadcrumb-item active">Users</li>
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
                    <div class="card-body">
                      <h5 class="card-title">All Users</h5>
                      <!-- Recent Sales -->
                      <div class="col-12">
                        <div class="recent-sales overflow-auto">
                        <span class="float-end mb-2">
                            <input type="checkbox" id="checkAll" class="form-group">&nbsp;Check All&nbsp;&nbsp;
                            <button type="button" class="btn btn-sm btn-primary del-selected">Active/InActive selected users</button>
                        </span>
                        <div class="row" id="show-add-blnce-form">
                          </div>
                          <br/>
                          <table class="table table-borderless" id="balance-datatable">
                            <thead>
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Username</th>
                                <th scope="col">Email</th>
                                <th scope="col">DoB</th>
                                <th scope="col">Gender</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Level</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
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
                    "url": "{{ url('admin/user-listing') }}",
                    "dataType": "json",
                    "type": "GET",
                },
                "columns": [
                    { "data": "uuid" },
                    { "data": "name" },
                    { "data": "username" },
                    { "data": "email" },
                    { "data": "dob" },
                    { "data": "gender" },
                    { "data": "phone" },
                    { "data": "level" },
                    { "data": "status" },
                    { "data": "action" },
                ],
            });


            $("#checkAll").click(function () {
                $('.select-user').not(this).prop('checked', this.checked);
            });

            $('.del-selected').on('click',function(e){
                if(confirm('Are you sure you want to active/inActive selected users?')){
                    let ids = [];
                    $('input:checked.select-user').each((ind,element) => {
                        let id = $(element).val();
                        if(!ids.includes(id)){
                            ids.push(id);
                        }
                    });
                    if(ids.length !== 0){
                        $.ajax({
                            url:'{{ url("admin/change-status") }}',
                            type:'post',
                            data:{
                                _token   : "{{ csrf_token() }}",
                                user_ids : ids
                            },
                            success:function(data){
                                tableData.ajax.reload();
                                $('#checkAll').prop('checked',false);
                            }
                        });
                    }
                }
            });
        });

    </script>
@endpush
