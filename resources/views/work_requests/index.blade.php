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
          <li class="breadcrumb-item active">Work Requests</li>
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
                      <h5 class="card-title">Send Work Request</h5>
                      <!-- Recent Sales -->
                      <div class="col-12">
                        @if (session('message'))
                            <div class="alert alert-danger" role="alert">
                                {{ __('Limit exceeded! You can post 5 ads per day.') }}
                            </div>
                        @endif
                        <div class="recent-sales overflow-auto">
                            <div>
                                <form action="" method="POST" enctype="multipart/form-data">
                                    @csrf
                                      <div class="row mb-3">
                                          <div class="col-sm-6">
                                            <label for="inputEmail3" class="col-form-label">Ad Image</label>
                                            <input type="file" class="form-control" name="file">
                                          </div>
                                          <div class="col-sm-6">
                                            <label for="inputEmail3" class="col-form-label">Link</label>
                                            <input type="text" class="form-control" name="link" >
                                          </div>
                                          <div class="col-sm-6">
                                            <label for="inputEmail3" class="col-form-label">Title</label>
                                            <input type="text" class="form-control" name="title" >
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="inputEmail3" class="col-form-label">Description</label>
                                            <input type="text" class="form-control" name="description">
                                          </div>

                                          <div class="col-12 col-md-6 col-lg-12 col-xl-12 mt-3">
                                              <button type="submit" class="btn btn-primary" id="withdraw-amount">send</button>
                                          </div>
                                        </div>
                                  </form>
                          </div>
                        <div class="row" id="show-add-blnce-form">
                          </div>
                          <br/>
                          <table class="table table-borderless" id="request-datatable">
                            <thead>
                              <tr>
                                <th scope="col">Image</th>
                                <th scope="col">Link</th>
                                <th scope="col">Title</th>
                                <th scope="col">Description</th>
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
                    "url": "{{ url('admin/user-work-listing') }}",
                    "dataType": "json",
                    "type": "GET",
                },
                "columns": [
                    { "data": "image" },
                    { "data": "link" },
                    { "data": "title" },
                    { "data": "description" },
                    { "data": "status" },
                    { "data": "action" },
                ],
            });

            $(document).on('click','.del-link',function(){
                if(confirm('Are you sure you want to delete link?')){
                    $.ajax({
                        url:'{{ url("admin/delete-link") }}',
                        type:'post',
                        data:{
                        _token  : "{{ csrf_token() }}",
                        link_id : $(this).attr('data-id'),
                        },
                        success:function(data){
                            tableData.ajax.reload();
                        }
                    });
                }
            });
        });
    </script>
@endpush
