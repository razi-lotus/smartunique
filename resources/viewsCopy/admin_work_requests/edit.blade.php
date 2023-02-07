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
                      <h5 class="card-title">{{ $work->user->name }}'s Work Requests</h5>
                      <!-- Recent Sales -->
                      <div class="col-12">
                        <div class="recent-sales overflow-auto">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Link</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($requests as $req)
                                        <tr>
                                            <td><img src="{{ asset('storage/'.$req->file) }}" width="50" height="50"></td>
                                            <td><a href="{{ $req->link }}" target="_blank">{{ $req->link }}</a></td>
                                            <td> <span class="status-text {{ $req->status == 'Pending' ? 'text-danger' : 'text-primary' }}">{{ $req->status }}</span></td>
                                            <td><a href="javascript:void(0)" class="prove-request" data-id="{{ $req->id }}">Approve</a></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                          <br/>
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

            $(document).on('click','.prove-request',function(){
                if(confirm('Are you sure you want to approve this request?')){
                    $.ajax({
                        url:'{{ url("admin/approve-link") }}',
                        type:'post',
                        data:{
                        _token  : "{{ csrf_token() }}",
                        link_id : $(this).attr('data-id'),
                        },
                        success:function(data){
                            if(data.message == 'success'){
                                // $('.status-text').text('Approved');
                                location.reload();
                            }
                            // tableData.ajax.reload();
                        }
                    });
                }
            });
    </script>
@endpush
