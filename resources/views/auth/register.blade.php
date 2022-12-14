@extends('layouts.app')

@section('content')
    <div class="container">
        <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
            <div class="row justify-content-center">
            <div class="col-lg-12 col-md-12 d-flex flex-column align-items-center justify-content-center">

                <div class="d-flex justify-content-center py-4">
                <a href="index.html" class="logo d-flex align-items-center w-auto">
                    <img src="assets/img/logo.png" alt="">
                    <span class="d-none d-lg-block">SmartUniqueInt</span>
                </a>
                </div><!-- End Logo -->

                <div class="card mb-3">

                <div class="card-body">

                    <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Create an Account</h5>
                    <p class="text-center small">Enter your personal details to create account</p>
                    </div>

                    <form class="row g-3 needs-validation" action="{{ route('register') }}" method="POST">
                        @csrf
                    <div class="col-12 col-md-6 col-lg-4 col-xl-4">
                        <label for="yourName" class="form-label">Your Name</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="yourName" value="{{ old('name') }}">
                        @error('name')
                            <div class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 col-xl-4">
                        <label for="yourPassword" class="form-label">Father Name</label>
                        <input type="text" name="father_name" class="form-control @error('father_name') is-invalid @enderror" value="{{ old('father_name') }}" id="yourPassword" >
                        @error('father_name')
                            <div class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>

                    <div class="col-12 col-md-6 col-lg-4 col-xl-4">
                        <label for="yourUsername" class="form-label">Username</label>
                        <div class="input-group has-validation">
                            <span class="input-group-text" id="inputGroupPrepend">@</span>
                            <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" value="{{ old('username') }}" id="yourUsername" >
                            @error('username')
                                <div class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 col-xl-4">
                        <label for="yourEmail" class="form-label">Date of Birth</label>
                        <input type="date" name="dob" class="form-control @error('dob') is-invalid @enderror" value="{{ old('dob') }}" id="yourEmail" >
                        @error('dob')
                            <div class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 col-xl-4">
                        <label for="yourEmail" class="form-label">Gender</label>
                        <select name="gender" class="form-control @error('gender') is-invalid @enderror" value="{{ old('gender') }}" id="yourEmail" >
                            <option value="1">Male</option>
                            <option value="0">Female</option>
                        </select>
                        @error('gender')
                            <div class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 col-xl-4">
                        <label for="yourEmail" class="form-label">Country</label>
                        <select name="country_id" class="form-control @error('country_id') is-invalid @enderror" value="{{ old('country_id') }}" id="yourEmail" >
                            <option value="167">Pakistan</option>
                        </select>
                        @error('country_id')
                            <div class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 col-xl-4">
                        <label for="yourEmail" class="form-label">State/Province</label>
                        <select name="state" class="form-control @error('state') is-invalid @enderror" value="{{ old('state') }}" id="yourEmail" >
                            <option value="1">Pakistan</option>
                            <option value="0">China</option>
                            <option value="0">Russia</option>
                        </select>
                        @error('state')
                            <div class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 col-xl-4">
                        <label for="yourEmail" class="form-label">City</label>
                        <select name="city_id" class="form-control @error('city_id') is-invalid @enderror" value="{{ old('city_id') }}" id="yourEmail" >
                            @foreach ($cities as $city)
                                <option value="{{ $city->id }}" >{{ $city->name }}</option>
                            @endforeach
                        </select>
                        @error('city_id')
                            <div class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>

                    <div class="col-12 col-md-6 col-lg-4 col-xl-4">
                        <label for="yourEmail" class="form-label">Zip Code</label>
                        <input type="text" name="zipcode" class="form-control @error('zipcode') is-invalid @enderror" value="{{ old('zipcode') }}" id="yourzipcode" >
                        @error('zipcode')
                            <div class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 col-xl-4">
                        <label for="yourEmail" class="form-label">Address</label>
                        <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" value="{{ old('address') }}" id="youraddress" >
                        @error('address')
                            <div class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 col-xl-4">
                        <label for="yourEmail" class="form-label">Street Address</label>
                        <input type="text" name="street_address" class="form-control @error('street_address') is-invalid @enderror" value="{{ old('street_address') }}" id="yourstreet_address" >
                        @error('street_address')
                            <div class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 col-xl-4">
                        <label for="yourEmail" class="form-label">Phone Number</label>
                        <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}" id="yourphone" >
                        @error('phone')
                            <div class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 col-xl-4">
                        <label for="yourEmail" class="form-label">CNIC</label>
                        <input type="text" name="cnic" class="form-control @error('cnic') is-invalid @enderror" value="{{ old('cnic') }}" id="yourcnic" >
                        @error('cnic')
                            <div class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 col-xl-4">
                        <label for="yourEmail" class="form-label">Payment Method</label>
                        <input type="text" name="payment_method" class="form-control @error('payment_method') is-invalid @enderror" value="{{ old('payment_method') }}" id="yourpayment_method" >
                        @error('payment_method')
                            <div class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 col-xl-4">
                        <label for="yourEmail" class="form-label">Sponsor Id</label>
                        <input type="text" name="sponsor_id" class="form-control @error('sponsor_id') is-invalid @enderror" value="{{ old('sponsor_id') }}" id="" >
                        @error('sponsor_id')
                            <div class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 col-xl-4">
                        <label for="yourEmail" class="form-label">What is your mother name?</label>
                        <input type="text" name="mother_name" class="form-control @error('mother_name') is-invalid @enderror" value="{{ old('mother_name') }}" id="yourmother_name" >
                        @error('mother_name')
                            <div class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 col-xl-4">
                        <label for="yourEmail" class="form-label">What is name of your favorite pet?</label>
                        <input type="text" name="pet_name" class="form-control @error('pet_name') is-invalid @enderror" value="{{ old('pet_name') }}" id="yourpet_name" >
                        @error('pet_name')
                            <div class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 col-xl-4">
                        <label for="yourEmail" class="form-label">Your Email</label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" id="yourEmail" >
                        @error('email')
                            <div class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>

                    <div class="col-12 col-md-6 col-lg-4 col-xl-4">
                        <label for="yourPassword" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="yourPassword" >
                        @error('password')
                            <div class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 col-xl-4">
                        <label for="yourPassword" class="form-label">Confirm Password</label>
                        <input type="password" name="password_confirmation" class="form-control @error('password') is-invalid @enderror" id=""  autocomplete="new-password">
                        <div class="invalid-feedback"><strong>The confirm password field is required</strong></div>
                    </div>

                    <div class="col-12">
                        <button class="btn btn-primary w-100" type="submit">Create Account</button>
                    </div>
                    <div class="col-12">
                        <p class="small mb-0">Already have an account? <a href="{{ route('login') }}">Log in</a></p>
                    </div>
                    </form>

                </div>
                </div>

            </div>
            </div>
        </div>

        </section>
  </div>
@endsection
