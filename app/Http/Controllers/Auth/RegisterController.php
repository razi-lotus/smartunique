<?php

namespace App\Http\Controllers\Auth;

use App\Models\City;
use App\Models\User;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name'      => ['required', 'string', 'max:255'],
            'username'  => ['required'],
            'email'     => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password'  => ['required', 'string', 'min:6', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $user =  User::create([
            "name"              => $data['name'],
            "username"          => $data['username'],
            "email"             => $data['email'],
            "password"          => Hash::make($data['password']),
            "father_name"       => $data['father_name'],
            "dob"               => $data['dob'],
            "gender"            => $data['gender'],
            "country_id"        => $data['country_id'],
            "state"             => $data['state'],
            "city_id"           => $data['city_id'],
            "zipcode"           => $data['zipcode'],
            "address"           => $data['address'],
            "street_address"    => $data['street_address'],
            "phone"             => $data['phone'],
            "cnic"              => $data['cnic'],
            "payment_method"    => $data['payment_method'],
            "sponsor_id"        => $data['sponsor_id'],
            "mother_name"       => $data['mother_name'],
            "pet_name"          => $data['pet_name'],
            "status"            => 'Active',

        ]);

        $user->uuid = 'SU-000'.$user->id;
        // DB::table('user_level')->insert([
        //     'user_id' => $user->id,
        //     'level_from' => 1,
        //     'level_to' => 1,
        //     'date_from' => date('Y-m-d'),
        //     'date_to' => date('Y-m-d')
        // ]);
        // balance...
        Mail::send('email.register', $data, function($message) use ($data){
            $message->to($data['email'])->subject('Registered Successfully');
        });
        $user->save();
        return $user;
    }

        /**
     * Show the application registration form.
     *
     * @return \Illuminate\View\View
     */
    public function showRegistrationForm()
    {
        $cities     = City::where('country_id',167)->get();
        $countries  = Country::all();
        return view('auth.register',compact('cities','countries'));
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {
        // return $request->all();
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        $this->guard()->login($user);

        if ($response = $this->registered($request, $user)) {
            return redirect()->route('admin.welcome.screen');
            // return view('welcome');
        }

        return $request->wantsJson()
                    ? new JsonResponse([], 201)
                    : redirect($this->redirectPath());
    }

    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard();
    }

    /**
     * The user has been registered.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function registered(Request $request, $user)
    {
        return $request->all();
    }
}
