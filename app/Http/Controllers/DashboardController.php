<?php

namespace App\Http\Controllers;

use App\Models\Balances;
use App\Models\User;
use Illuminate\Http\Request;

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
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // return Balances::with(['user'])->get();
        $users = User::all();
        return view('dashboard',compact('users'));
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
                    $itemData['status'] = $item->status;
                    $itemData['action'] = "<div class='btn-group'><a href='". url('sdadsf', $item->id) ."/edit' class=''>Edit</a>&nbsp;&nbsp;
                    <a href='javascript:void(0);' data-item='" . $item->id . "' class='ml-2 sweetalertDelete'>Delete</a></div>";
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
