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
          <li class="breadcrumb-item active">Withdrawals</li>
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
                      <h5 class="card-title">Withdrawals Requests</h5>
                      <!-- Recent Sales -->
                      <div class="col-12">
                        <div class="recent-sales overflow-auto">

                          <div class="filter">
                            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                              <li class="dropdown-header text-start">
                                <h6>Filter</h6>
                              </li>

                              <li><a class="dropdown-item" href="#">Today</a></li>
                              <li><a class="dropdown-item" href="#">This Month</a></li>
                              <li><a class="dropdown-item" href="#">This Year</a></li>
                            </ul>
                          </div>
                        <span class="float-end mb-2">
                            <input type="checkbox" id="checkAll" class="form-group">&nbsp;Check All&nbsp;&nbsp;
                            <button type="button" class="btn btn-sm btn-primary del-selected">Prove selected</button>
                        </span>
                        <div class="row" id="show-add-blnce-form">
                          </div>
                          <br/>
                          <table class="table table-borderless" id="request-datatable">
                            <thead>
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Amount</th>
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
            var tableData =   $('#request-datatable').DataTable({
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
                    "url": "{{ url('admin/withdrawal-listing') }}",
                    "dataType": "json",
                    "type": "GET",
                },
                "columns": [
                    { "data": "id" },
                    { "data": "name" },
                    { "data": "amount" },
                    { "data": "status" },
                    { "data": "action" },
                ],
            });


            $("#checkAll").click(function () {
                $('.select-user').not(this).prop('checked', this.checked);
            });

            $('.del-selected').on('click',function(e){
                if(confirm('Are you sure you want to active selected users?')){
                    let ids = [];
                    $('input:checked.select-user').each((ind,element) => {
                        let id = $(element).val();
                        if(!ids.includes(id)){
                            ids.push(id);
                        }
                    });
                    console.log(ids,'idss');
                    if(ids.length !== 0){
                        $.ajax({
                            url:'{{ url("admin/prove-withdrawal") }}',
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
