<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index(){
        $users = User::all();
        return view('users',compact('users'));
    }

    public function UserList(Request $request) {
        $columns    = array(0 => 'uuid', 1 => 'name',2 => 'username',3 => 'email',4 => 'dob',5 => 'gender',6=>'phone',7=>'level',8=>'status');
        $order      = 'uuid'; $dir = 'DESC';

        if ($request->input('order.0.column') != null) {
            $order  = $columns[$request->input('order.0.column')];
            $dir    = $request->input('order.0.dir');
        }
        $totalData  = $totalFiltered = 0;
        $pagination = ['page'=>request()->start,'perpage'=>request()->length];

        if (!empty($request->input('search.value'))) {
            $search     = $request->input('search.value');
            $records    = User::where('name', 'LIKE', "%{$search}%")->offset($pagination['page'])->limit($pagination['perpage'])->get();
            $totalFiltered = count($records);
        } else {
            $records    = User::orderBy($order, $dir)->offset($pagination['page'])->limit($pagination['perpage'])->get();
            $totalData  = $totalFiltered = User::count();
        }

        $data = array();
        if (!empty($records)) {
            foreach ($records as $key=> $item) {
                    $itemData['uuid']       = $item->uuid;
                    $itemData['name']       = $item->name;
                    $itemData['username']   = $item->username;
                    $itemData['email']      = $item->email;
                    $itemData['dob']        = date('Y-m-d',strtotime($item->dob));
                    $itemData['gender']     = $item->gender == 1? 'Male':'Female';
                    $itemData['phone']      = $item->phone;
                    $itemData['level']      = $item->level;
                    $itemData['status']     = '<span class="badge '.($item->status=="Active" ? "bg-success" : "bg-danger").'">'.$item->status.'</span>';
                    $itemData['action']     = '<div><input type="checkbox" name="user_id" value="'.$item->id.'" class="select-user" />&nbsp;<a class="" href="#">Del</a></div>';
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

    public function changeStatus(Request $request){
        $users = User::whereIn('id',$request->user_ids)->get();
        if(count($users) > 0){
            foreach($users as $user){
                if($user->status !== 'Active'){
                    $user->update(['status' => 'Active']);
                }
            }
        }
        return response()->json(['message' => 'success']);
    }

}
