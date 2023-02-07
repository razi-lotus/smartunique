<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $request->validate([
            'uuid' => 'required',
            'password' => 'required'
        ]);
        $user = User::where('uuid',$request->uuid)->first();
        if($user && $user->status == 'Active'){
            if(Hash::check($request->password,$user->password)){
                auth()->login($user);
                return redirect()->route('admin.dashboard');
            }else{
                return redirect()->route('login');
            }
            // if (method_exists($this, 'hasTooManyLoginAttempts') &&
            //     $this->hasTooManyLoginAttempts($request)) {
            //         $this->fireLockoutEvent($request);

            //         return $this->sendLockoutResponse($request);
            //     }

            //     if ($this->attemptLogin($request)) {
            //         if ($request->hasSession()) {
            //             $request->session()->put('auth.password_confirmed_at', time());
            //         }

            //         return $this->sendLoginResponse($request);
            //     }
            // $this->incrementLoginAttempts($request);
            // return $this->sendFailedLoginResponse($request);
        }else{
            return redirect('login')->with('status', 'Unverified account');
        }
    }
}
