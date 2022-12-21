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
    public function userUpgradeAccount(Request $request)
    {
        // return $request->all();
        $balances       = TotalBalances::where('user_id',Auth::user()->id)->first();
        $currentLevel   = UserLevel::with(['levelName'])->where('user_id',Auth::user()->id)->first();

        // if($balances && $balances->total < 50){
        //     return response()->json(['error' => 'Not eligible']);
        // }

        if(!$currentLevel && $balances->total == 50 && $request->level == 'level-1'){
            // if($currentLevel && $currentLevel->levelName->name !== 'Director'){
                UserLevel::create([
                    'user_id'               => Auth::user()->id,
                    'old_level_id'          => 4,
                    'current_level_id'      => 4,
                    'old_level_date'        => date('Y-m-d'),
                    'current_level_date'    => date('Y-m-d')
                ]);
                $balances->update(['total' => (float)$balances->total - 50]);
            // }
        }elseif($currentLevel && $currentLevel->levelName->name == 'Member' && $balances->total >= 25 && $request->level == 'level-2'){
                $currentLevel->update([
                    'old_level_id'          => $currentLevel->current_level_id,
                    'current_level_id'      => 3,
                    'old_level_date'        => $currentLevel->current_level_date,
                    'current_level_date'    => date('Y-m-d')
                ]);
                $balances->update(['total' => (float)$balances->total - 25]);

        }elseif($currentLevel && $currentLevel->levelName->name == 'Supervisor' && $balances->total >= 25 && $request->level == 'level-3'){
            $currentLevel->update([
                'old_level_id'          => $currentLevel->current_level_id,
                'current_level_id'      => 2,
                'old_level_date'        => $currentLevel->current_level_date,
                'current_level_date'    => date('Y-m-d')
            ]);
            $balances->update(['total' => (float)$balances->total - 25]);
        }elseif($currentLevel && $currentLevel->levelName->name == 'Manager' && $balances->total >= 50 && $request->level == 'level-4'){
            $currentLevel->update([
                'old_level_id'          => $currentLevel->current_level_id,
                'current_level_id'      => 1,
                'old_level_date'        => $currentLevel->current_level_date,
                'current_level_date'    => date('Y-m-d')
            ]);
            $balances->update(['total' => (float)$balances->total - 50]);
        }

        return response()->json(['success' => 'Account upgraded successfully']);
    }

    public function upgradeAccount(){
        $balanceConfirm = Balances::where('user_id',Auth::user()->id)->first();
         if(!$balanceConfirm){
             return redirect()->route('admin.welcome.screen')->with('message','Balance not transferred yet, please contact to the company');
         }
         $user          = User::with(['account','account.levelName'])->where('id',Auth::user()->id)->first();
         $user_level    = UserLevel::where('user_id',$user->id)->first();
         if(!$user_level){
            $user_level  = $this->userUpgradeAccount2();
         }
        //  return $user;
         if($user && $user->acc_request !== 1){
             $user->update(['acc_request' => 1]);
            //  $this->userUpgradeAccount();
             AdminBalance::create([
                 'user_id'   => $user->id,
                 'amount'    => $balanceConfirm->amount
             ]);
            //  $balanceConfirm->update(['amount' => 0]);

             // referered person's commission
             $referredPerson = User::with(['account.levelName'])->where('uuid',$user->sponsor_id)->first();
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

     public function userUpgradeAccount2()
    {
        $balances       = TotalBalances::where('user_id',Auth::user()->id)->first();

        if($balances && $balances->total < 50){
            return redirect()->route('admin.welcome.screen')->with('message','Balance not transferred yet, please contact to the company');
        }

        if($balances && $balances->total >= 50 && $balances->total < 75){
            $level = UserLevel::create([
                    'user_id'               => Auth::user()->id,
                    'old_level_id'          => 4,
                    'current_level_id'      => 4,
                    'old_level_date'        => date('Y-m-d'),
                    'current_level_date'    => date('Y-m-d')
                ]);
                $balances->update(['total' => (float)$balances->total - 50]);
        }elseif($balances && $balances->total >= 75 && $balances->total < 100){
            $level = UserLevel::create([
                    'user_id'               => Auth::user()->id,
                    'old_level_id'          => 3,
                    'current_level_id'      => 3,
                    'old_level_date'        => date('Y-m-d'),
                    'current_level_date'    => date('Y-m-d')
                ]);
                $balances->update(['total' => (float)$balances->total - 75]);
        }elseif($balances && $balances->total >= 100 && $balances->total < 150){
            $level = UserLevel::create([
                    'user_id'               => Auth::user()->id,
                    'old_level_id'          => 2,
                    'current_level_id'      => 2,
                    'old_level_date'        => date('Y-m-d'),
                    'current_level_date'    => date('Y-m-d')
                ]);
                $balances->update(['total' => (float)$balances->total - 100]);
        }elseif($balances && $balances->total >= 150){
            $level = UserLevel::create([
                    'user_id'               => Auth::user()->id,
                    'old_level_id'          => 1,
                    'current_level_id'      => 1,
                    'old_level_date'        => date('Y-m-d'),
                    'current_level_date'    => date('Y-m-d')
                ]);
                $balances->update(['total' => (float)$balances->total - 150]);
        }

        return $level;
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
