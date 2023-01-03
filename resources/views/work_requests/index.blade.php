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
          <li class="breadcrumb-item active">My Assignments</li>
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
                      <h5 class="card-title">Data Entery/Post</h5>
                      <!-- Recent Sales -->
                      <div class="col-12">
                        @if (session('message'))
                            <div class="alert alert-danger" role="alert">
                                {{ __('Limit exceeded! You can post 5 ads per day.') }}
                            </div>
                        @endif
                        @if (session('link'))
                            <div class="alert alert-success" role="alert">
                                <span class="link-text">
                                    {{ session('link') }}
                                </span>
                                <span class="float-end copy-link"><a href="javascript:void(0);" onclick="copyToClipboard(event)">Copy Link</a></span>
                            </div>
                        @endif
                        <div class="recent-sales overflow-auto">
                            <div>
                                <form action="" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row mb-3">
                                        <div class="col-sm-6">
                                            <label for="inputEmail3" class="col-form-label">Ad Image</label>
                                            <input type="file" class="form-control" name="file" onchange="loadFile(event)">
                                        </div>
                                        <div class="col-sm-6">
                                              <img src="" id="outPutFile">
                                          </div>
                                          <div class="col-sm-6">
                                            <label for="inputEmail3" class="col-form-label">Title</label>
                                            <input type="text" class="form-control" name="title" >
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="inputEmail3" class="col-form-label">Description</label>
                                            <textarea class="form-control" name="description"></textarea>
                                            {{-- <input type="text" class="form-control" name="description"> --}}
                                          </div>
                                          @if ($currentLevel)
                                            <div class="col-12 col-md-6 col-lg-12 col-xl-12 mt-3">
                                              <button type="submit" class="btn btn-primary" id="withdraw-amount">submit</button>
                                            </div>
                                            @endif
                                        </div>
                                  </form>
                          </div>
                        <div class="row" id="show-add-blnce-form">
                          </div>
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

    <style>
        .dataTables_length{
            display: none !important;
        }
    </style>

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
        function copyToClipboard() {
            var $temp = $("<input>");
            $("body").append($temp);
            $temp.val($('.link-text').text()).select();
            document.execCommand("copy");
            $temp.remove();
            alert('Link copied successfully,');
        }
        var loadFile = function(event) {
            var output    = document.getElementById('outPutFile');
            output.width  = '80';
            output.height = '80';
            output.src    = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output.src) // free memory
            }
        };
        $(document).ready(function(){
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
