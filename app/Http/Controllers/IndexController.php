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
        $balances       = TotalBalances::where('user_id',Auth::user()->id)->first();
        $currentLevel   = UserLevel::with(['levelName'])->where('user_id',Auth::user()->id)->first();
        if($request->level == 'level-1' && !$currentLevel){
            $level = UserLevel::create([
                'user_id'               => Auth::user()->id,
                'old_level_id'          => 4,
                'current_level_id'      => 4,
                'old_level_date'        => date('Y-m-d'),
                'current_level_date'    => date('Y-m-d')
            ]);
            $balances->update(['total' => (float)$balances->total - 50]);
            $this->upgradeAccount($level);
        }elseif($request->level == 'level-2'){
            $checkAmnt = !empty($this->checkAmount($currentLevel,$request)) ? $this->checkAmount($currentLevel,$request) : 75;
            if($currentLevel && $currentLevel->current_level_id == 3){
                return true;
            }
            if($currentLevel){
                $currentLevel->update([
                    'old_level_id'          => $currentLevel->current_level_id,
                    'current_level_id'      => 3,
                    'old_level_date'        => $currentLevel->current_level_date,
                    'current_level_date'    => date('Y-m-d')
                ]);
            }else{
                $currentLevel = $this->createIfNotHaveLevel(3);
            }
            $balances->update(['total' => (float)$balances->total - $checkAmnt]);
            $this->upgradeAccount($currentLevel->refresh());
        }elseif($request->level == 'level-3'){
            if($currentLevel && $currentLevel->current_level_id == 2){
                return true;
            }
            $checkAmnt = !empty($this->checkAmount($currentLevel,$request)) ? $this->checkAmount($currentLevel,$request) : 100;
            if($currentLevel){
                $currentLevel->update([
                    'old_level_id'          => $currentLevel->current_level_id,
                    'current_level_id'      => 2,
                    'old_level_date'        => $currentLevel->current_level_date,
                    'current_level_date'    => date('Y-m-d')
                ]);
            }else{
                $currentLevel = $this->createIfNotHaveLevel(2);
            }
            $balances->update(['total' => (float)$balances->total - $checkAmnt]);
            $this->upgradeAccount($currentLevel->refresh());
        }elseif($request->level == 'level-4'){
            if($currentLevel && $currentLevel->current_level_id == 1){
                return true;
            }
            $checkAmnt = !empty($this->checkAmount($currentLevel,$request)) ? $this->checkAmount($currentLevel,$request) : 150;
            if($currentLevel){
                $currentLevel->update([
                    'old_level_id'          => $currentLevel->current_level_id,
                    'current_level_id'      => 1,
                    'old_level_date'        => $currentLevel->current_level_date,
                    'current_level_date'    => date('Y-m-d')
                ]);
            }else{
                $currentLevel = $this->createIfNotHaveLevel(1);
            }

            $balances->update(['total' => (float)$balances->total - $checkAmnt]);
            $this->upgradeAccount($currentLevel->refresh());
        }
        return response()->json(['success' => 'Account upgraded successfully']);
    }

    public function createIfNotHaveLevel($level){
        return UserLevel::create([
            'user_id'               => Auth::user()->id,
            'old_level_id'          => $level,
            'current_level_id'      => $level,
            'old_level_date'        => date('Y-m-d'),
            'current_level_date'    => date('Y-m-d')
        ]);
    }
    public function checkAmount($level,$request){
        if($level && $level->current_level_id == 4){
            if($request->level == 'level-3'){
                return 50;
            }elseif($request->level == 'level-2'){
                return 25;
            }elseif($request->level == 'level-4'){
                return 100;
            }else{
                return 25;
            }
        }elseif($level && $level->current_level_id == 3){
            if($request->level == 'level-4'){
                return 75;
            }else{
                return 25;
            }
        }elseif($level && $level->current_level_id == 2){
            return 50;
        }
    }

    public function upgradeAccount($level){
         $newUser  = User::with(['account','account.levelName'])->where('id',Auth::user()->id)->first();
         if($newUser){
             $referredPerson = User::with(['account.levelName'])->where('uuid',$newUser->sponsor_id)->first();
             $referred_level = UserLevel::where('user_id',$referredPerson->id)->first();
             $commission = 0;
             if($referred_level->current_level_id == 1 || $referred_level->current_level_id == 2)
             {
                if((int)$level->current_level_id == 1){
                    $commission = $newUser->acc_request!=0 ? 3 : 16;
                    Balances::create([
                        'user_id'       => $referredPerson->id,
                        'refered_id'    => Auth::user()->id,
                        'amount'        => $commission,
                        'income_type'   => 'Sponsored'
                    ]);
                }elseif((int)$level->current_level_id == 2){
                    $commission = $newUser->acc_request!=0 ? 3 : 13;
                    Balances::create([
                        'user_id'       => $referredPerson->id,
                        'refered_id'       => Auth::user()->id,
                        'amount'        => $commission,
                        'income_type'   => 'Sponsored'
                    ]);
                }elseif((int)$level->current_level_id == 3){
                    $commission = $newUser->acc_request!=0 ? 3 : 10;
                    Balances::create([
                        'user_id'       => $referredPerson->id,
                        'refered_id'       => Auth::user()->id,
                        'amount'        => $commission,
                        'income_type'   => 'Sponsored'
                    ]);
                }elseif((int)$level->current_level_id == 4){
                    $commission = $newUser->acc_request!=0 ? 3 : 7;
                    Balances::create([
                        'user_id'       => $referredPerson->id,
                        'refered_id'       => Auth::user()->id,
                        'amount'        => $commission,
                        'income_type'   => 'Sponsored'
                    ]);
                }
             }
             elseif($referred_level->current_level_id == 3)
             {
                if((int)$level->current_level_id == 1){
                    $commission = $newUser->acc_request!=0 ? 3 : 14;
                    Balances::create([
                        'user_id'       => $referredPerson->id,
                        'refered_id'       => Auth::user()->id,
                        'amount'        => $commission,
                        'income_type'   => 'Sponsored'
                    ]);
                }elseif((int)$level->current_level_id == 2){
                    $commission = $newUser->acc_request!=0 ? 3 : 11;
                    Balances::create([
                        'user_id'       => $referredPerson->id,
                        'refered_id'       => Auth::user()->id,
                        'amount'        => $commission,
                        'income_type'   => 'Sponsored'
                    ]);
                }elseif((int)$level->current_level_id == 3){
                    $commission = $newUser->acc_request!=0 ? 3 : 8;
                    Balances::create([
                        'user_id'       => $referredPerson->id,
                        'refered_id'       => Auth::user()->id,
                        'amount'        => $commission,
                        'income_type'   => 'Sponsored'
                    ]);
                }elseif((int)$level->current_level_id == 4){
                    $commission = $newUser->acc_request!=0 ? 3 : 5;
                    Balances::create([
                        'user_id'       => $referredPerson->id,
                        'refered_id'       => Auth::user()->id,
                        'amount'        => $commission,
                        'income_type'   => 'Sponsored'
                    ]);
                }
             }elseif($referred_level->current_level_id == 4)
             {
                if((int)$level->current_level_id == 1){
                    $commission = $newUser->acc_request!=0 ? 3 : 12;
                    Balances::create([
                        'user_id'       => $referredPerson->id,
                        'refered_id'       => Auth::user()->id,
                        'amount'        => $commission,
                        'income_type'   => 'Sponsored'
                    ]);
                }elseif((int)$level->current_level_id == 2){
                    $commission = $newUser->acc_request!=0 ? 3 : 9;
                    Balances::create([
                        'user_id'       => $referredPerson->id,
                        'refered_id'    => Auth::user()->id,
                        'amount'        => $commission,
                        'income_type'   => 'Sponsored'
                    ]);
                }elseif((int)$level->current_level_id == 3){
                    $commission = $newUser->acc_request!=0 ? 3 : 6;
                    Balances::create([
                        'user_id'       => $referredPerson->id,
                        'refered_id'       => Auth::user()->id,
                        'amount'        => $commission,
                        'income_type'   => 'Sponsored'
                    ]);
                }elseif((int)$level->current_level_id == 4){
                    $commission = $newUser->acc_request!=0 ? 3 : 3;
                    Balances::create([
                        'user_id'       => $referredPerson->id,
                        'refered_id'       => Auth::user()->id,
                        'amount'        => $commission,
                        'income_type'   => 'Sponsored'
                    ]);
                }
             }
            $commissionTransfer = TotalBalances::where('user_id',User::where('uuid',Auth::user()->sponsor_id)->first()->id)->first();
            if($commissionTransfer){
                $amnt = ($commissionTransfer->total + $commission);
                $commissionTransfer->update(['total' => $amnt]);
            }else{
                TotalBalances::create([
                    'user_id' => $referredPerson->id,
                    'total' => $commission
                ]);
            }
            $newUser->update(['acc_request' => 1]);
            return redirect()->route('admin.userDashboard');
         }
    }

    public function checkCommission($existingLevel,$newlevel)
    {
        if((int)$existingLevel->current_level_id == 4){
            if((int)$newlevel->current_level_id == 3){
                return 3;
            }elseif((int)$newlevel->current_level_id == 2){
                return 6;
            }elseif((int)$newlevel->current_level_id == 1){
                return 9;
            }
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
