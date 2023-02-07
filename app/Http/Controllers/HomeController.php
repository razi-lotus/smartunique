<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\User;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
        // $this->middleware('redirectWel');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function welcome(){
        return view('welcome');
    }

    public function selectCity(Request $request){
        // return $request->country_id;
        $cities = DB::table('cities')->where('country_id',$request->country_id)->get();
        return response()->json(['cities' => $cities]);
    }

    public function showprofile(){
        $user       = Auth::user();
        $countries  = Country::all();
        $country    = Country::where('id',Auth::user()->country_id)->first();
        $city       = City::where('id',Auth::user()->city_id)->first();
        return view('profile.index',compact('user','countries','city','country'));
    }

    public function saveProfile(Request $request){
        // return $request->all();
        $user = User::find(Auth::user()->id);
        if($user){
            $path = !empty($request->file('profile')) ? Storage::disk('public')->put('profile', $request->file('profile')) : $user->file;
            $user->update([
                'name'          => $request->name ? $request->name : $user->name,
                'father_name'   => $request->father_name ? $request->father_name : $user->father_name,
                'phone'         => $request->phone ? $request->phone : $user->phone,
                'country_id'    => $request->country_id ? $request->country_id : $user->country_id,
                'city_id'       => $request->city_id ? $request->city_id : $user->city_id,
                'address'       => $request->address ? $request->address : $user->address,
                'cnic'          => $request->cnic ? $request->cnic : $user->cnic,
                'mother_name'   => $request->mother_name ? $request->mother_name : $user->mother_name,
                'pet_name'      => $request->pet_name ? $request->pet_name : $user->pet_name,
                'dob'           => $request->dob ? $request->dob : $user->dob,
                'file'          => $path,
            ]);

            return redirect()->route('admin.user_profile')->with('success','Profile updated successfully.');
        }
    }
}
