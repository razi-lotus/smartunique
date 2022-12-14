<?php

namespace App\Http\Controllers;

use App\Models\Transactions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionsController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
        $this->middleware('redirectWel');
    }

    public function userTansaction(){
        return view('user_transactions');
    }

    public function transactions(){
        return view('transactions');
    }

    public function userTransactionListing(Request $request) {
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
            $records        = Transactions::with(['user'])->where('user_id',Auth::user()->id)->where('amount', 'LIKE', "%{$search}%")->offset($pagination['page'])->limit($pagination['perpage'])->get();
            $totalFiltered  = count($records);
        } else {
            $records    = Transactions::with(['user'])->where('user_id',Auth::user()->id)->orderBy($order, $dir)->offset($pagination['page'])->limit($pagination['perpage'])->get();
            $totalData  = $totalFiltered = Transactions::where('user_id',Auth::user()->id)->count();
        }

        $data = array();
        if (!empty($records)) {
            foreach ($records as $key=> $item) {
                    $itemData['id']         = $item->user->uuid;
                    // $itemData['name']       = $item->user->name;
                    $itemData['amount']     = $item->amount;
                    $itemData['status']     = '<span class="badge bg-success">'.$item->status.'</span>';
                    $itemData['action']     = '<div><a class="" href="#">Del</a></div>';
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

    public function transactionsListing(Request $request) {
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
            $records        = Transactions::with(['user'])->where('amount', 'LIKE', "%{$search}%")->offset($pagination['page'])->limit($pagination['perpage'])->get();
            $totalFiltered  = count($records);
        } else {
            $records    = Transactions::with(['user'])->orderBy($order, $dir)->offset($pagination['page'])->limit($pagination['perpage'])->get();
            $totalData  = $totalFiltered = Transactions::count();
        }

        $data = array();
        if (!empty($records)) {
            foreach ($records as $key=> $item) {
                    $itemData['id']         = $item->user->uuid;
                    $itemData['name']       = $item->user->name;
                    $itemData['amount']     = $item->amount;
                    $itemData['status']     = '<span class="badge bg-success">'.$item->status.'</span>';
                    $itemData['action']     = '<div><a class="" href="#">Del</a></div>';
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
