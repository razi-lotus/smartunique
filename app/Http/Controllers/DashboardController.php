<?php

namespace App\Http\Controllers;

use App\Models\AdminBalance;
use App\Models\Balances;
use App\Models\TotalBalances;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('redirectWel');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // return Balances::with(['user'])->get();
        if(Auth::user() && Auth::user()->type == 'Admin'){
            $users = User::all();
            return view('dashboard',compact('users'));
        }else{
            // $users = User::all();
            return redirect()->route('admin.userDashboard');
        }
    }


    public function getUserStatus(){
        $users      = User::with(['account'])->get();
        // return $users;
        $active     = 0;
        $inActive   = 0;
        $pending    = 0;
        $level1     = 0;
        $level2     = 0;
        $level3     = 0;
        $level4     = 0;
        $today_reg  = 0;
        $today_upgraded  = 0;
        foreach($users as $user){
            if($user->status == 'Active' && $user->type !== 'Admin'){
                $active++;
            }elseif($user->status == 'InActive' && $user->type !== 'Admin'){
                $inActive++;
            }elseif($user->status == 'Penging' && $user->type !== 'Admin'){
                $pending++;
            }

            if($user->account !== null && $user->account->current_level_id == 1 && $user->type !== 'Admin'){
                $level1++;
            }elseif($user->account !== null && $user->account->current_level_id == 2 && $user->type !== 'Admin'){
                $level2++;
            }elseif($user->account !== null && $user->account->current_level_id == 3 && $user->type !== 'Admin'){
                $level3++;
            }elseif($user->account !== null && $user->account->current_level_id == 4 && $user->type !== 'Admin'){
                $level4++;
            }
            if(strtotime(date('Y-m-d',strtotime($user->created_at))) == strtotime(date('Y-m-d'))){
                $today_reg++;
            }
            if($user->account !== null && strtotime(date('Y-m-d',strtotime($user->account->current_level_date))) == strtotime(date('Y-m-d'))){
                $today_upgraded++;
            }
        }
        return response()->json([
            'active'    => $active,
            'inActive'  => $inActive,
            'pending'   => $pending,
            'level1'    => $level1,
            'level2'    => $level2,
            'level3'    => $level3,
            'level4'    => $level4,
            'today_reg' => $today_reg,
            'today_upgraded' => $today_upgraded
        ]);
    }

    public function userDashboard()
    {
        $balances   = TotalBalances::where('user_id',Auth::user()->id)->first();
        $points     = User::where('sponsor_id',Auth::user()->uuid)->get();
        return view('user_dashboard',compact('balances','points'));
    }

    public function BalanceList(Request $request) {
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
            $records    = Balances::with(['user' => function($q) use($search){
                $q->orWhere('name', 'LIKE', "%{$search}%");
            }])->orWhere('amount', 'LIKE', "%{$search}%")->offset($pagination['page'])->limit($pagination['perpage'])->get();
            $totalFiltered = count($records);
        } else {
            $records    = Balances::orderBy($order, $dir)->with(['user'])->offset($pagination['page'])->limit($pagination['perpage'])->get();
            $totalData  = $totalFiltered = Balances::count();
        }

        $data = array();
        if (!empty($records)) {
            foreach ($records as $key=> $item) {
                    $itemData['id']     = $item->user ? $item->user->uuid : '';
                    $itemData['name']   = $item->user ? $item->user->name : '';
                    $itemData['amount'] = $item->amount;
                    $itemData['income_type'] = $item->income_type;
                    $itemData['status'] = $item->status;
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

    public function userTree(Request $request){
        $users = User::all();
        if(Auth::user() && Auth::user()->type !== 'Admin'){
            $users = User::where('sponsor_id',Auth::user()->uuid)->get();
        }
        return view('user_tree',compact('users'));
    }

    public function userRefTree(Request $request){
        // return $request->all();
        $users = User::where('sponsor_id',$request->user_id)->get();
        return response()->json(['users' => $users]);
    }
}
