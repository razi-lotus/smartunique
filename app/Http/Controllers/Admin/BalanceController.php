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
use App\Models\TotalBalances;
use App\Models\UserBalTransfer;
use Illuminate\Support\Facades\Auth;

class BalanceController extends Controller
{

    public function add(BalanceRequest $request){
        // return $request->all();
        $data       = Balances::create($request->prepaireRequest());
        $userLevel  = UserLevel::where('user_id',$request->user_id)->first();
        // ----- level updating ------
        if($userLevel){
            $userLevel->update([
                'old_level_id'          => $userLevel->current_level_id,
                'current_level_id'      => $request->acc_id,
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

    public function addUserBal(Request $request){
        // return $request->all();
        $totalBal = TotalBalances::where('user_id',Auth::user()->id)->first();
        if($request->amount < $totalBal->total){
            $data = UserBalTransfer::create([
                'user_id'       => Auth::user()->id,
                'transfer_to'   => $request->user_id,
                'amount'        => $request->amount
            ]);
            $transferToBal = TotalBalances::where('user_id',$request->user_id)->first();
            if($transferToBal){
                $transferToBal->update(['total' => (float)$transferToBal->total += $request->amount]);
            }else{
                TotalBalances::create([
                    'user_id'   => $request->user_id,
                    'total'     => $request->amount
                ]);
            }
            Balances::create(['user_id' => $request->user_id,'amount' => $request->amount]);
            $totalBal->update(['total' => (float)$totalBal->total - $request->amount]);
            return response()->json(['success' => 'Balance transfered successfully','balance' => $totalBal->refresh()]);
        }else{
            return response()->json(['error' => 'Not enougth balance']);
        }
    }

    public function balance_show(){
        $users = User::all();
        return view('balance_show',compact('users'));
    }

    public function showBalTansfer(){
        $users = User::all();
        $balance = TotalBalances::where('user_id',Auth::user()->id)->first();
        return view('user_balance_show',compact('users','balance'));
    }

    public function userBalListing(Request $request){
        $columns    = array(0 => 'id', 1 => 'name',2 => 'amount',3 => 'status');
        $order      = 'id'; $dir = 'DESC';

        if ($request->input('order.0.column') != null) {
            $order  = $columns[$request->input('order.0.column')];
            $dir    = $request->input('order.0.dir');
        }
        $totalData  = $totalFiltered = 0;
        $pagination = ['page'=>request()->start,'perpage'=>request()->length];

        if (!empty($request->input('search.value'))) {
            $search     = $request->input('search.value');
            $records    = UserBalTransfer::whereHas('received_user',function($query) use($search){
                $query->where('name','like','%'.$search.'%');
            })->with(['received_user' => function($q) use ($search){
                $q->where('name','like','%'.$search.'%');
            }])->where('user_id',Auth::user()->id)->orWhere('transfer_to',Auth::user()->id)->orWhere('amount', 'LIKE', "%{$search}%")
            ->offset($pagination['page'])->limit($pagination['perpage'])->get();
            $totalFiltered = count($records);
        } else {
            $records    = UserBalTransfer::where('user_id',Auth::user()->id)->orWhere('transfer_to',Auth::user()->id)->orderBy($order, $dir)->with(['received_user'])->offset($pagination['page'])->limit($pagination['perpage'])->get();
            $totalData  = $totalFiltered = UserBalTransfer::where('user_id',Auth::user()->id)->orWhere('transfer_to',Auth::user()->id)->count();
        }

        // return $records;
        $data = array();
        if (!empty($records)) {
            foreach ($records as $key=> $item) {
                    $itemData['id']     = $item->received_user ? $item->received_user->uuid : '';
                    $itemData['name']   = $item->received_user ? ucfirst($item->received_user->name) : '';
                    $itemData['amount'] = $item->amount;
                    $status = $item->user_id == Auth::user()->id ? 'Transferred' : 'Received';
                    $cls = $status == "Transferred" ? "bg-danger" : "bg-success";
                    $itemData['status'] = '<span class="badge '.$cls.'">'.$status.'</span>';
                    // $itemData['action'] = "<div class='btn-group'><a href='". url('sdadsf', $item->id) ."/edit' class=''>Edit</a>&nbsp;&nbsp;
                    // <a href='javascript:void(0);' data-item='" . $item->id . "' class='ml-2 sweetalertDelete'>Delete</a></div>";
                    $data[] = $itemData;
            }
        }

        $json_data = array(
            "draw" => intval($request->input('draw')),
            "recordsTotal" => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data" => $data
        );
        echo json_encode($json_data);
    }
}
