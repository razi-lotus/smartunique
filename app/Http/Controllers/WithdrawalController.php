<?php

namespace App\Http\Controllers;

use App\Models\Balances;
use App\Models\TotalBalances;
use App\Models\Withdrawal;
use App\Models\Transactions;
use Illuminate\Http\Request;
use App\Models\UserWithdrawal;
use Illuminate\Support\Facades\Auth;

class WithdrawalController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
        $this->middleware('redirectWel');
    }

    public function index(){
        return view('withdrawal_request');
    }

    public function withdrawalList(Request $request) {
        $columns    = array(0 => 'id', 1 => 'name',2 => 'amount',3 => 'status');
        $order      = 'id'; $dir = 'DESC';

        if ($request->input('order.0.column') != null) {
            $order  = $columns[$request->input('order.0.column')];
            $dir    = $request->input('order.0.dir');
        }
        $totalData  = $totalFiltered = 0;
        $pagination = ['page'=>request()->start,'perpage'=>request()->length];

        if (!empty($request->input('search.value'))) {
            $search         = $request->input('search.value');
            $records        = UserWithdrawal::with(['user'])->where('amount', 'LIKE', "%{$search}%")->offset($pagination['page'])->limit($pagination['perpage'])->get();
            $totalFiltered  = count($records);
        } else {
            $records    = UserWithdrawal::with(['user'])->orderBy($order, $dir)->offset($pagination['page'])->limit($pagination['perpage'])->get();
            $totalData  = $totalFiltered = UserWithdrawal::count();
        }

        $data = array();
        if (!empty($records)) {
            foreach ($records as $key=> $item) {
                    $itemData['id']         = $item->user->uuid;
                    $itemData['name']       = $item->user->name;
                    $itemData['amount']     = $item->amount;
                    $itemData['status']     = '<span class="badge '.($item->status=="Approved" ? "bg-success" : "bg-danger").'">'.$item->status.'</span>';
                    $itemData['action']     = '<div><input type="checkbox" name="user_id" value="'.$item->id.'" class="select-user" />&nbsp;<a class="" href="#">Del</a></div>';
                    $data[] = $itemData;
            }
        }

        $json_data = array(
            "draw"              => intval($request->input('draw')),
            "recordsTotal"      => intval($totalData),
            "recordsFiltered"   => intval($totalFiltered),
            "data"              => $data
        );
        echo json_encode($json_data);
    }

    public function proveWithdrawal(Request $request){
        $users = UserWithdrawal::whereIn('id',$request->user_ids)->get();
        $transactionData = [];
        if(count($users) > 0){
            foreach($users as $user){
                if($user->status !== 'Approved'){
                    if(isset($transactionData[$user->user_id])){
                        $transactionData[$user->user_id] += $user->amount;
                    }else{
                        $transactionData[$user->user_id] = $user->amount;
                    }
                    $user->update(['status' => 'Approved']);
                }
            }
        }
        foreach($transactionData as $key => $tr){
            Transactions::create([
                'user_id' => $key,
                'amount' => $tr,
                'status' => 'Approved'
            ]);
            $baldeduction = TotalBalances::where('user_id',$key)->first();
            if($baldeduction){
                $amnt = ($baldeduction->total - $tr);
                $baldeduction->update(['total' => $amnt]);
            }
        }
        return response()->json(['message' => $transactionData]);
    }

    public function user_withdrawal(){
        $balance = TotalBalances::where('user_id',Auth::user()->id)->first();
        return view('user_withdrawal',compact('balance'));
    }

    public function withdrawAmount(Request $request){
        $data = UserWithdrawal::create([
            'amount'    => $request->amount,
            'user_id'   => Auth::user()->id,
            'status'    => 'Pending'
        ]);
        return response()->json(['message' => 'success']);
    }


    public function UserWithdrawalList(Request $request) {
        $columns    = array(0 => 'id', 1 => 'amount',2 => 'status');
        $order      = 'id'; $dir = 'DESC';

        if ($request->input('order.0.column') != null) {
            $order  = $columns[$request->input('order.0.column')];
            $dir    = $request->input('order.0.dir');
        }
        $totalData  = $totalFiltered = 0;
        $pagination = ['page'=>request()->start,'perpage'=>request()->length];

        if (!empty($request->input('search.value'))) {
            $search         = $request->input('search.value');
            $records        = UserWithdrawal::with(['user'])->where('user_id',Auth::user()->id)->where('amount', 'LIKE', "%{$search}%")->offset($pagination['page'])->limit($pagination['perpage'])->get();
            $totalFiltered  = count($records);
        } else {
            $records    = UserWithdrawal::with(['user'])->where('user_id',Auth::user()->id)->orderBy($order, $dir)->offset($pagination['page'])->limit($pagination['perpage'])->get();
            $totalData  = $totalFiltered = UserWithdrawal::where('user_id',Auth::user()->id)->count();
        }

        $data = array();
        if (!empty($records)) {
            foreach ($records as $key=> $item) {
                    $itemData['id']         = $item->id;
                    $itemData['amount']     = $item->amount;
                    $itemData['status']     = '<span class="badge '.($item->status=="Approved" ? "bg-success" : "bg-danger").'">'.$item->status.'</span>';
                    $itemData['action']     = '<div>&nbsp;<a class="" href="#">Del</a></div>';
                    $data[] = $itemData;
            }
        }

        $json_data = array(
            "draw"              => intval($request->input('draw')),
            "recordsTotal"      => intval($totalData),
            "recordsFiltered"   => intval($totalFiltered),
            "data"              => $data
        );
        echo json_encode($json_data);
    }
}
