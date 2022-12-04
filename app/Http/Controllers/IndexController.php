<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Balances;
use App\Models\UserLevel;
use App\Models\AdminBalance;
use Illuminate\Http\Request;
use App\Models\TotalBalances;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function upgradeAccount(){
        $balanceConfirm = Balances::where('user_id',Auth::user()->id)->where('income_type','Account Purchase')->first();
         if(!$balanceConfirm){
             return redirect()->route('admin.welcome.screen')->with('message','Balance not transferred yet, please contact to the company');
         }
         $user = User::with(['level','level.levelName'])->where('id',Auth::user()->id)->first();
         $user_level = UserLevel::where('user_id',$user->id)->first();
        //  return $user_level;
         if($user && $user->acc_request !== 1){
             $user->update(['acc_request' => 1]);
             AdminBalance::create([
                 'user_id'   => $user->id,
                 'amount'    => $balanceConfirm->amount
             ]);
             $balanceConfirm->update(['amount' => 0]);

             // referered person's commission
             $referredPerson = User::with(['level.levelName'])->where('uuid',$user->sponsor_id)->first();
             $referred_level = UserLevel::where('user_id',$referredPerson->id)->first();
             $commission = 0;
             if($user_level->current_level_id == 1 || $user_level->current_level_id == 2)
             {
                if($referred_level->current_level_id == 1){
                    Balances::create([
                        'user_id'       => $referredPerson->id,
                        'amount'        => 16,
                        'income_type'   => 'Sponsored'
                    ]);
                    $commission = 16;
                }elseif($referred_level->current_level_id == 2){
                    Balances::create([
                        'user_id'       => $referredPerson->id,
                        'amount'        => 13,
                        'income_type'   => 'Sponsored'
                    ]);
                    $commission = 13;
                }elseif($referred_level->current_level_id == 3){
                    Balances::create([
                        'user_id'       => $referredPerson->id,
                        'amount'        => 10,
                        'income_type'   => 'Sponsored'
                    ]);
                    $commission = 10;
                }elseif($referred_level->current_level_id == 4){
                    Balances::create([
                        'user_id'       => $referredPerson->id,
                        'amount'        => 7,
                        'income_type'   => 'Sponsored'
                    ]);
                    $commission = 7;
                }
             }
             elseif($user_level->current_level_id == 3)
             {
                if($referred_level->current_level_id == 1){
                    Balances::create([
                        'user_id'       => $referredPerson->id,
                        'amount'        => 14,
                        'income_type'   => 'Sponsored'
                    ]);
                    $commission = 14;
                }elseif($referred_level->current_level_id == 2){
                    Balances::create([
                        'user_id'       => $referredPerson->id,
                        'amount'        => 11,
                        'income_type'   => 'Sponsored'
                    ]);
                    $commission = 11;
                }elseif($referred_level->current_level_id == 3){
                    Balances::create([
                        'user_id'       => $referredPerson->id,
                        'amount'        => 8,
                        'income_type'   => 'Sponsored'
                    ]);
                    $commission = 8;
                }elseif($referred_level->current_level_id == 4){
                    Balances::create([
                        'user_id'       => $referredPerson->id,
                        'amount'        => 5,
                        'income_type'   => 'Sponsored'
                    ]);
                    $commission = 5;
                }
             }elseif($user_level->current_level_id == 4)
             {
                if($referred_level->current_level_id == 1){
                    Balances::create([
                        'user_id'       => $referredPerson->id,
                        'amount'        => 12,
                        'income_type'   => 'Sponsored'
                    ]);
                    $commission = 12;
                }elseif($referred_level->current_level_id == 2){
                    Balances::create([
                        'user_id'       => $referredPerson->id,
                        'amount'        => 9,
                        'income_type'   => 'Sponsored'
                    ]);
                    $commission = 9;
                }elseif($referred_level->current_level_id == 3){
                    Balances::create([
                        'user_id'       => $referredPerson->id,
                        'amount'        => 6,
                        'income_type'   => 'Sponsored'
                    ]);
                    $commission = 6;
                }elseif($referred_level->current_level_id == 4){
                    Balances::create([
                        'user_id'       => $referredPerson->id,
                        'amount'        => 3,
                        'income_type'   => 'Sponsored'
                    ]);
                    $commission = 3;
                }
             }
            $commissionTransfer = TotalBalances::where('user_id',User::where('uuid',Auth::user()->sponsor_id)->first()->id)->first();
            if($commissionTransfer){
                $amnt = ($commissionTransfer->total + $commission);
                $commissionTransfer->update(['total' => $amnt]);
            }
            // else{
            //     TotalBalances::create([
            //         'user_id' => Auth::user()->id,
            //         'total' => $commission
            //     ]);
            // }
             return redirect()->route('admin.userDashboard');
         }
     }

     public function secondUpgradation(){
        $upgradeAccRequest  = Balances::where('user_id',Auth::user()->id)->where('income_type','Upgrade Account')->orderBy('id', 'DESC')->first();
        $userLevel          = UserLevel::with(['levelName'])->where('user_id',Auth::user()->id)->first();
        return view('upgrade_account',compact('userLevel','upgradeAccRequest'));
     }

     public function accountUpgradeRequest(){
        // $userLevel  = UserLevel::with(['levelName'])->where('user_id',Auth::user()->id)->first();
        // $userLevel->update([
        //     'old_level_id'          => $userLevel->current_level_id,
        //     'current_level_id'       => $request->acc_id,
        //     'old_level_date'        => $userLevel->current_level_date,
        //     'current_level_date'    => date('Y-m-d')
        // ]);
     }

     public function deleteAccountAfter24Hrs(){
         $users = User::where('acc_request',0)->whereDate('created_at','<',date('Y-m-d h:i:s', strtotime("-1 day")))->get();
         if(count($users) > 0){
            foreach($users as $user){
                $user->delete();
            }
         }
        //  return User::all();

     }
}
