<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Request as Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RequestController extends Controller
{

    public function index(){
        // return Requests::with(['user'])->get();
        return view('requests');
    }

    public function RequestList(Request $request) {
        $columns    = array(0 => 'id', 1 => 'name',2 => 'points',3 => 'status');
        $order      = 'id'; $dir = 'DESC';

        if ($request->input('order.0.column') != null) {
            $order  = $columns[$request->input('order.0.column')];
            $dir    = $request->input('order.0.dir');
        }
        $totalData  = $totalFiltered = 0;
        $pagination = ['page'=>request()->start,'perpage'=>request()->length];

        if (!empty($request->input('search.value'))) {
            $search         = $request->input('search.value');
            $records        = Requests::with(['user'])->where('name', 'LIKE', "%{$search}%")->offset($pagination['page'])->limit($pagination['perpage'])->get();
            $totalFiltered  = count($records);
        } else {
            $records    = Requests::with(['user'])->orderBy($order, $dir)->offset($pagination['page'])->limit($pagination['perpage'])->get();
            $totalData  = $totalFiltered = Requests::count();
        }

        $data = array();
        if (!empty($records)) {
            foreach ($records as $key=> $item) {
                    $itemData['id']         = $item->user->uuid;
                    $itemData['name']       = $item->user->name;
                    $itemData['points']     = $item->points;
                    $itemData['status']     = '<span class="badge '.($item->status=="Active" ? "bg-success" : "bg-danger").'">'.$item->status.'</span>';
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
}
