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
          @if (Auth::user() && Auth::user()->type == 'Admin')
            <li class="breadcrumb-item active"><a href="{{ route('admin.userTreeAdmin') }}">User Tree</a></li>
          @else
            <li class="breadcrumb-item active"><a href="{{ route('admin.userTree') }}">User Tree</a></li>
          @endif
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
                      <h5 class="card-title">Users Tree

                          <div class="search-bar float-end">
                              <form class="search-form d-flex align-items-center" method="POST" action="">
                                  @csrf
                                  <input type="text" name="search_query" placeholder="Search by name and id" title="Enter search keyword">
                                  <button type="submit" title="Search"><i class="bi bi-search"></i></button>
                                </form>
                              </div>
                            </h5>
                      <!-- Recent Sales -->
                      <div class="col-12">
                        <div class="row">
                            @if (count($users) == 0)
                                <p>Not registered any user with your reference.</p>
                            @endif
                            @foreach ($users as $user)
                                <div class="col-xl-3 col-lg-3 col-sm-6 col-12 mt-3">
                                    <div class="flip-card" data-id="{{ $user->uuid }}" data-name="{{ $user->name }}">
                                        <div class="flip-card-inner">
                                            <div class="flip-card-front">
                                                @if ($user->file !== '')
                                                    <img src="{{ asset('storage/'.$user->file) }}" alt="Avatar" style="width:200px;height:200px;">
                                                @else
                                                    <img src="{{ asset('storage/userAvatar.jpg') }}" alt="Avatar" style="width:200px;height:200px;">
                                                @endif
                                        </div>
                                        <div class="flip-card-back">
                                            <h1 class="text-capitalize">{{ $user->name }}</h1>
                                            <p>{{ $user->address }}</p>
                                            <p>Level {{ $user->level }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                      </div><!-- End Recent Sales -->
                    </div>
                  </div>
            </div><!-- End Customers Card -->

          </div>
        </div><!-- End Left side columns -->

        <!-- Button trigger modal -->
{{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Launch demo modal
  </button> --}}

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Users with reference <span class="text-capitalize user-ref-name"></span></h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="row map-users">

          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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

            $('.flip-card').on('click',function(e){
                // alert($(this));
                // return;
                $('.map-users').html('');
                $('.user-ref-name').html($(this).attr('data-name'));
                $.ajax({
                    url:'{{ url("admin/get-ref-users") }}',
                    type:'post',
                    data:{
                        _token   : "{{ csrf_token() }}",
                        user_id : $(this).attr('data-id')
                    },
                    success:function(data){
                        $('#exampleModal').modal('show');
                        if(data.users.length !== 0){
                            data.users.forEach(element => {
                                var pic = element.file !== '' ? element.file : 'userSmall.png';
                                $('.map-users').append(`
                                <div class="col-3">
                                    <div class="chip text-capitalize">
                                        <img src="{{ asset('storage/') }}/${pic}" alt="Person" width="96" height="96">
                                        ${element.name}
                                        </div>
                                        </div>`
                                        );
                                    });
                        }else{
                            $('.map-users').html('<p>No data found</p>')
                        }
                    }
                });
            });
        });

    </script>
@endpush
