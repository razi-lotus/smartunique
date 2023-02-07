@extends('layouts.app')

@section('content')
    <div style="background-image: url(/img/abstract-security-technology-background_52530-21.jpg); background-size: cover; background-position: center; background-repeat: no-repeat" class="container">
        <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
            <div class="row justify-content-center">
            <div class="col-lg-12 col-md-12 d-flex flex-column align-items-center justify-content-center">

                <div class="d-flex justify-content-center py-4">
                <a href="index.html" class="logo d-flex align-items-center w-auto">
                    <img src="assets/img/stock-logo.png" alt="">
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
                        <select name="country_id" class="select-country form-control @error('country_id') is-invalid @enderror" value="{{ old('country_id') }}" id="yourEmail" >
                            @foreach ($countries as $country)
                            <option value="{{ $country->id }}" data-id="{{ $country->id }}" class="text-captialize">{{ $country->name }}</option>
                        @endforeach
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
                            <option value="Punjab">Punjab</option>
                            <option value="Sindh">Sindh</option>
                            <option value="Balochistan">Balochistan</option>
                            <option value="Khyber Pakhtunkhwa">Khyber Pakhtunkhwa</option>
                        </select>
                        @error('state')
                            <div class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 col-xl-4">
                        <label for="yourEmail" class="form-label">City</label>
                        <select name="city_id" class="cities-select form-control @error('city_id') is-invalid @enderror" value="{{ old('city_id') }}" id="yourEmail" >
                            <option value="">select city</option>
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
                        <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}" id="phone-number" >
                        <div id="recaptcha-container"></div>
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
                        <button class="btn btn-primary w-100" type="submit" onclick="otpSend()">Create Account</button>
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
@push('scripts')
    <script src="https://www.gstatic.com/firebasejs/8.9.1/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.9.1/firebase-auth.js"></script>
    <script>

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
        });
        const config = {
            apiKey: "AIzaSyCR7bPcGKj68esbWkq5-LsT8WBBjOofLgc",
            authDomain: "matshadi-19bc4.firebaseapp.com",
            projectId: "matshadi-19bc4",
            storageBucket: "matshadi-19bc4.appspot.com",
            messagingSenderId: "737286761014",
            appId: "1:737286761014:web:56d92a1e776bf0bd660697",
            measurementId: "G-FN8VTPGTBS"
        };

        firebase.initializeApp(config);

        window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier('recaptcha-container', {
            'size': 'invisible',
            'callback': (response) => {
                // reCAPTCHA solved, allow signInWithPhoneNumber.
                onSignInSubmit();
            }
        });


        function otpSend() {
            var phoneNumber = document.getElementById('phone-number').value;
            const appVerifier = window.recaptchaVerifier;
            firebase.auth().signInWithPhoneNumber(phoneNumber, appVerifier)
                .then((confirmationResult) => {
                    // SMS sent. Prompt user to type the code from the message, then sign the
                    // user in with confirmationResult.confirm(code).
                    window.confirmationResult = confirmationResult;

                    document.getElementById("sent-message").innerHTML = "Message sent succesfully.";
                    document.getElementById("sent-message").classList.add("block");
                    document.getElementById("auth").classList.add("hidden");
                    document.getElementById("otp").classList.remove("hidden");
                }).catch((error) => {
                    document.getElementById("error-message").innerHTML = error.message;
                    document.getElementById("error-message").classList.add("block");
                });
        }

        function otpVerify() {
            var code = document.getElementById('otp-code').value;
            confirmationResult.confirm(code).then(function(result) {
                // User signed in successfully.
                var user = result.user;
                var phoneNumber = document.getElementById('phone-number').value;
                document.getElementById('mobile_no').value = phoneNumber;

                document.getElementById("sent-message").innerHTML = "You are succesfully verified.";
                document.getElementById("sent-message").classList.add("block");
                document.getElementById("otpCon").classList.add("hidden");
                document.getElementById("register").classList.remove("hidden");
                document.getElementById('email_verify').value = "today";

            }).catch(function(error) {

                document.getElementById("error-message").innerHTML = error.message;
                document.getElementById("error-message").classList.add("block");
                document.getElementById("sent-message").classList.add("hidden");

            });
        }
    </script>
@endpush
