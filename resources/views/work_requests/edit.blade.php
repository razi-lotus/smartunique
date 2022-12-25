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
          <li class="breadcrumb-item active">My Assignment</li>
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
                      <h5 class="card-title">Poster</h5>
                      <!-- Recent Sales -->
                      <div class="row">
                        {{-- <div class="">
                            <div> --}}
                                <div class="col-xl-6 col-lg-6 col-sm-12">
                                    <img src="{{ asset('storage/'.$work->file) }}" width="300" height="200">
                                </div>
                                <div class="col-xl-6 col-lg-6 col-sm-12">
                                    <label for="inputEmail3" class="col-form-label"><strong>Title:</strong></label>
                                    <div>{{ $work->title }}</div>
                                    <label for="inputEmail3" class="col-form-label"><strong>Description:</strong></label>
                                    <div>{{ $work->description }}</div>
                                </div>
                          {{-- </div>
                          <br/>
                        </div> --}}
                      </div>
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
