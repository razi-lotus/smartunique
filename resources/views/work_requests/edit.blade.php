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
                      <h5 class="card-title">Work Requests</h5>
                      <!-- Recent Sales -->
                      <div class="col-12">
                        <div class="recent-sales overflow-auto">
                            <div>
                                <form action="{{ route('admin.editWorkRequest',['id'=>$work->id]) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                      <div class="row mb-3">
                                          <div class="col-sm-6">
                                            <label for="inputEmail3" class="col-form-label">Poster One</label>
                                            <input type="file" class="form-control" name="file1">
                                          </div>
                                          <div class="col-sm-6">
                                            <label for="inputEmail3" class="col-form-label">Link</label>
                                            <input type="text" class="form-control" name="link1" value="{{ $work->link }}">
                                          </div>
                                          <div class="col-sm-6">
                                            <label for="inputEmail3" class="col-form-label">Title</label>
                                            <input type="text" class="form-control" name="title" value="{{ $work->title }}">
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="inputEmail3" class="col-form-label">Description</label>
                                            <input type="text" class="form-control" name="description" value="{{ $work->description }}">
                                          </div>
                                          <div class="col-12 col-md-6 col-lg-12 col-xl-12 mt-3">
                                              <button type="submit" class="btn btn-primary" id="withdraw-amount">send</button>
                                          </div>
                                        </div>
                                  </form>
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
    </script>
@endpush
