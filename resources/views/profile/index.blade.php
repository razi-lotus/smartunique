@extends('layouts.app')
@section('content')
    @include('common.header')

  <!-- ======= Sidebar ======= -->
  @include('common.sidebar')

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Profile</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Users</li>
          <li class="breadcrumb-item active">Profile</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                <img src="{{ Auth::user()->file == null ? asset('storage/userAvatar.jpg') : asset('storage/'.$user->file) }}" alt="Profile" class="rounded-circle">
              <h2 class="text-capitalize">{{ Auth::user()->name }}</h2>
              <h3>
                @php
                    $level = DB::table('user_level')->where('user_id',Auth::user()->id)->first();
                    if($level){
                        $levelName = DB::table('levels')
                        ->where('id',$level->current_level_id)
                        ->first();
                        echo $levelName ? $levelName->name : '';
                    }
                @endphp
              </h3>
              <div class="social-links mt-2">
                {{-- <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a> --}}
              </div>
            </div>
          </div>

        </div>

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab"
                    data-bs-target="#profile-overview">Overview</button>
                </li>
                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
                </li>
                {{-- <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change
                    Password</button>
                </li> --}}

              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">

                  <h5 class="card-title">Profile Details</h5>
                  @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Full Name</div>
                    <div class="col-lg-9 col-md-8 text-capitalize">{{ Auth::user()->name }}</div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Father Name</div>
                    <div class="col-lg-9 col-md-8 text-capitalize">{{ Auth::user()->father_name }}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">User Id</div>
                    <div class="col-lg-9 col-md-8">{{ Auth::user()->uuid }}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Username</div>
                    <div class="col-lg-9 col-md-8">{{ Auth::user()->username }}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Email</div>
                    <div class="col-lg-9 col-md-8">{{ Auth::user()->email }}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Phone</div>
                    <div class="col-lg-9 col-md-8">{{ Auth::user()->phone }}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">City</div>
                    <div class="col-lg-9 col-md-8">
                        @php
                            $city = DB::table('cities')->where('id',Auth::user()->city_id)->first();
                            echo $city?$city->name:'';
                        @endphp
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Country</div>
                    <div class="col-lg-9 col-md-8">
                        @php
                            $country = DB::table('countries')->where('id',Auth::user()->country_id)->first();
                            echo $country?$country->name:'';
                        @endphp
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Address</div>
                    <div class="col-lg-9 col-md-8">{{ Auth::user()->address }}</div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">CNIC</div>
                    <div class="col-lg-9 col-md-8">{{ Auth::user()->cnic }}</div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Mother Name</div>
                    <div class="col-lg-9 col-md-8">{{ Auth::user()->mother_name }}</div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Pet Name</div>
                    <div class="col-lg-9 col-md-8">{{ Auth::user()->pet_name }}</div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Date of Birth</div>
                    <div class="col-lg-9 col-md-8">{{ date('Y-m-d',strtotime(Auth::user()->dob)) }}</div>
                  </div>

                </div>

                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                  <!-- Profile Edit Form -->
                  <form method="POST" action="" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                      <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                      <div class="col-md-8 col-lg-9">
                        @if (Auth::user() && Auth::user()->file !== null)
                            <img src="{{ asset('storage/'.Auth::user()->file)  }}" alt="Profile" id="outPutFile" width="70" height="70">
                        @else
                            <img src="{{ asset('storage/userAvatar.jpg') }}" alt="Profile" id="outPutFile" width="70" height="70">
                        @endif
                        <div class="pt-2">
                            <a href="javascript:void(0);" class="btn btn-primary btn-sm" title="Upload new profile image">
                                <input type="file" class="btn btn-primary btn-sm" id="profile-pic" name="profile" onchange="loadFile(event)">
                                <i class="bi bi-upload"></i>
                            </a>
                            <a href="javascript:void(0);" onclick="delImage(event)" class="btn btn-danger btn-sm" title="Remove my profile image">
                                <i class="bi bi-trash"></i>
                            </a>
                        </div>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="name" type="text" class="form-control" id="fullName" value="{{ Auth::user()->name }}">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="company" class="col-md-4 col-lg-3 col-form-label">Father Name</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="father_name" type="text" class="form-control" id="company"
                          value="{{ Auth::user()->father_name }}">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Job" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="phone" type="text" class="form-control" id="Job" value="{{ Auth::user()->phone }}">
                      </div>
                    </div>

                    <div class="row mb-3">
                        <label for="Country" class="col-md-4 col-lg-3 col-form-label">Country</label>
                        <div class="col-md-8 col-lg-9">
                          <select class="select-country form-control" name="country_id">
                              <option value="{{ $country->id }}">{{ $country->name }}</option>
                              @foreach ($countries as $country)
                                  <option value="{{ $country->id }}" data-id="{{ $country->id }}" class="text-captialize">{{ $country->name }}</option>
                              @endforeach
                          </select>
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="Address" class="col-md-4 col-lg-3 col-form-label">City</label>
                        <div class="col-md-8 col-lg-9">
                            <select class="cities-select form-control" name="city_id">
                              <option value="{{ $city->id }}">{{ $city->name }}</option>
                          </select>
                        </div>
                      </div>

                    <div class="row mb-3">
                      <label for="Address" class="col-md-4 col-lg-3 col-form-label">Address</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="address" type="text" class="form-control" id="Address"
                          value="{{ Auth::user()->address }}">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Phone" class="col-md-4 col-lg-3 col-form-label">CNIS</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="cnic" type="text" class="form-control" id="Phone" value="{{ Auth::user()->cnic }}">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Email" class="col-md-4 col-lg-3 col-form-label">Mother Name</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="mother_name" type="text" class="form-control" id="Email" value="{{ Auth::user()->mother_name }}">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Twitter" class="col-md-4 col-lg-3 col-form-label">Pet Name</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="pet_name" type="text" class="form-control"
                          value="{{ Auth::user()->pet_name }}">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Facebook" class="col-md-4 col-lg-3 col-form-label">Date of Birth</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="dob" type="date" class="form-control" id="Facebook"
                          value="{{ Auth::user()->dob }}">
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                  </form><!-- End Profile Edit Form -->

                </div>

                <div class="tab-pane fade pt-3" id="profile-settings">

                  <!-- Settings Form -->
                  <form>

                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Email Notifications</label>
                      <div class="col-md-8 col-lg-9">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="changesMade" checked>
                          <label class="form-check-label" for="changesMade">
                            Changes made to your account
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="newProducts" checked>
                          <label class="form-check-label" for="newProducts">
                            Information on new products and services
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="proOffers">
                          <label class="form-check-label" for="proOffers">
                            Marketing and promo offers
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="securityNotify" checked disabled>
                          <label class="form-check-label" for="securityNotify">
                            Security alerts
                          </label>
                        </div>
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                  </form><!-- End settings Form -->

                </div>

                <div class="tab-pane fade pt-3" id="profile-change-password">
                  <!-- Change Password Form -->
                  <form>

                    <div class="row mb-3">
                      <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="password" type="password" class="form-control" id="currentPassword">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="newpassword" type="password" class="form-control" id="newPassword">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="renewpassword" type="password" class="form-control" id="renewPassword">
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Change Password</button>
                    </div>
                  </form><!-- End Change Password Form -->

                </div>

              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main>

  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>SmartUniqueInt</span></strong>. All Rights Reserved
    </div>
  </footer>
@endsection

@push('scripts')
    <script>
        var loadFile = function(event) {
            var output    = document.getElementById('outPutFile');
            output.width  = '70';
            output.height = '70';
            output.src    = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output.src) // free memory
            }
        };
        @php
            $profilePic = Auth::user()->file !== null ? Auth::user()->file : '';
            $staticPath = asset('storage/userAvatar.jpg');
        @endphp
        var delImage = function(event){
            let isPic = {!! json_encode($profilePic) !!};
            let pic     = isPic !== '' ? {!! json_encode(asset('storage/'.$profilePic)) !!} : '';
            console.log(pic,'picc')
            var output  = document.getElementById('outPutFile');
            output.src  = pic !== '' ? pic : {!! json_encode($staticPath) !!};
            $('#profile-pic').val('');

        }
        $(document).on('change','.select-country',function(){
        // alert('hi')
        $('.cities-select').html('<option>select city</option>')
            $.ajax({
                url:'{{ url("select-city") }}',
                type:'post',
                data:{
                    _token  : "{{ csrf_token() }}",
                    country_id : $('.select-country option:selected').attr('data-id'),
                },
                success:function(data){
                    data.cities.forEach(element => {
                        $('.cities-select').append('<option value="'+element.id+'" data-name="'+element.name+'">'+element.name+'</option>');
                    });
                }
            });
        })
    </script>
@endpush
