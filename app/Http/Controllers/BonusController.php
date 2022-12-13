<?php

namespace App\Http\Controllers;

use App\Models\Bonus;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BonusController extends Controller
{
    public function showBonus(){
        $users = User::all();
        return view('bonus.bonus',compact('users'));
    }

    public function showUserBonus(){
        return view('bonus.user_bonus');
    }

    public function saveBonus(Request $request){
        // return $request->all();
        $validate = $request->validate([
            'user_id' => 'required|exists:users,id'
        ]);
        $data = Bonus::create([
            'user_id'   => $request->user_id,
            'amount'    => $request->amount
        ]);
        return redirect()->route('admin.addBonus');
    }

    public function BonusListing(Request $request)
    {
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
            $records    = Bonus::whereHas('user',function($query) use($search){
                $query->where('name','like','%'.$search.'%');
            })->with(['user' => function($q) use ($search){
                $q->where('name','like','%'.$search.'%');
            }])->orWhere('amount', 'LIKE', "%{$search}%")
            ->offset($pagination['page'])->limit($pagination['perpage'])->get();
            $totalFiltered = count($records);
        } else {
            $records    = Bonus::orderBy($order, $dir)->with(['user'])->offset($pagination['page'])->limit($pagination['perpage'])->get();
            $totalData  = $totalFiltered = Bonus::count();
        }

        $data = array();
        if (!empty($records)) {
            foreach ($records as $key=> $item) {
                    $itemData['id']     = $item->user ? $item->user->uuid : '';
                    $itemData['name']   = $item->user ? ucfirst($item->user->name) : '';
                    $itemData['amount'] = $item->amount;
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

    public function UserBonusListing(Request $request)
    {
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
            $records    = Bonus::with(['user'])->where('user_id',Auth::user()->id)->where('amount', 'LIKE', "%{$search}%")->offset($pagination['page'])->limit($pagination['perpage'])->get();
            $totalFiltered = count($records);
        } else {
            $records    = Bonus::orderBy($order, $dir)->with(['user'])->where('user_id',Auth::user()->id)->offset($pagination['page'])->limit($pagination['perpage'])->get();
            $totalData  = $totalFiltered = Bonus::where('user_id',Auth::user()->id)->count();
        }

        $data = array();
        if (!empty($records)) {
            foreach ($records as $key=> $item) {
                    $itemData['id']     = $item->user ? $item->user->uuid : '';
                    $itemData['name']   = $item->user ? ucfirst($item->user->name) : '';
                    $itemData['amount'] = $item->amount;
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
