<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Balances;
use App\Models\UserLevel;
use Psy\Readline\Userland;
use App\Models\AdminBalance;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\BalanceRequest;

class BalanceController extends Controller
{

    public function add(BalanceRequest $request){
        // return $request->all();
        $data       = Balances::create($request->prepaireRequest());
        $userLevel  = UserLevel::where('user_id',$request->user_id)->first();
        if($userLevel){
            $userLevel->update([
                'old_level_id'          => $userLevel->current_level_id,
                'current_level_id'       => $request->acc_id,
                'old_level_date'        => $userLevel->current_level_date,
                'current_level_date'    => date('Y-m-d')
            ]);
        }else{
            UserLevel::create([
                'user_id'               => $request->user_id,
                'old_level_id'          => $request->acc_id,
                'current_level_id'      => $request->acc_id,
                'old_level_date'        => date('Y-m-d'),
                'current_level_date'    => date('Y-m-d')
            ]);
        }

        if($request->acc_type == 'Upgrade Account'){
            // $upgradeAccRequest  = Balances::where('user_id',$request->user_id)->where('income_type','Upgrade Account')->orderBy('id', 'DESC')->first();
            // if($upgradeAccRequest){
                AdminBalance::create([
                    'user_id'   => $request->user_id,
                    'amount'    => ($request->amount / 100)
                ]);
                $data->update(['amount' => 0]);
            // }
        }

        return response()->json($data);
    }

    public function balance_show(){
        $users = User::all();
        return view('balance_show',compact('users'));
    }
}
