<?php

namespace App\Http\Controllers;

use App\Models\UserLevel;
use App\Models\WorkRequest;
use Illuminate\Http\Request;
use App\Models\TotalBalances;
use App\Models\AdminWorkRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class WorkController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
        // $this->middleware('redirectWel');
    }

    public function index(){

        $currentLevel   = UserLevel::with(['levelName'])->where('user_id',Auth::user()->id)->first();
        return view('work_requests.index',compact('currentLevel'));
    }

    public function history(){
        return view('work_requests.history');
    }

    public function saveWork(Request $request){
        // return $request->all();
            $work_requests = WorkRequest::where('user_id',Auth::user()->id)->whereDate('date',date('Y-m-d'))->get();
            // return (count($work_requests));
            if(count($work_requests) == 5){
                return redirect()->route('admin.sendWorkRequest')->with('message','Only 5 ads can be posted per day.');
            }
            $work = WorkRequest::create([
                'user_id'       => Auth::user()->id,
                'file'          => $request->has('file') ? Storage::disk('public')->put('work_request',$request->file('file')) : null,
                // 'link'          => $request->get('link'),
                'title'         => $request->get('title'),
                'description'   => $request->get('description'),
                'status'        => 'Active',
                'date'          => date('Y-m-d')
            ]);
            // balance transfer

        $currentLevel   = UserLevel::with(['levelName'])->where('user_id',Auth::user()->id)->first();
        $amount = 0;
        if($currentLevel->levelName->name == 'Member'){
            $amount = round(5 / 30,2);
        }elseif($currentLevel->levelName->name == 'Supervisor'){
            $amount = round(7 / 30,2);
        }elseif($currentLevel->levelName->name == 'Manager'){
            $amount = round(10 / 30,2);
        }elseif($currentLevel->levelName->name == 'Director'){
            $amount = round(15 / 30,2);
        }
        $balance = DB::table('balances')->insert([
            'user_id'       => Auth::user()->id,
            'amount'        => $amount,
            'income_type'   => 'Ad Posting',
        ]);
        $baldeduction = TotalBalances::where('user_id',Auth::user()->id)->first();
        if($baldeduction){
            $amnt = ($baldeduction->total + $amount);
            $baldeduction->update(['total' => $amnt]);
        }

        return redirect()->route('admin.sendWorkRequest')->with('link',url('/admin/editwork',$work->id).'/edit');
    }

    public function UserWorkListing(Request $request) {
        $columns    = array(0 => 'image', 1 => 'link',2 => 'status');
        $order      = 'id'; $dir = 'DESC';

        if ($request->input('order.0.column') != null) {
            $order  = $columns[$request->input('order.0.column')];
            $dir    = $request->input('order.0.dir');
        }
        $totalData  = $totalFiltered = 0;
        $pagination = ['page'=>request()->start,'perpage'=>request()->length];

        if (!empty($request->input('search.value'))) {
            $search         = $request->input('search.value');
            $records        = WorkRequest::with(['user'])->where('user_id',Auth::user()->id)->where('title','like','%'.$search.'%')->orWhere('description','like','%'.$search.'%')->offset($pagination['page'])->limit($pagination['perpage'])->get();
            $totalFiltered  = count($records);
        } else {
            $records    = WorkRequest::with(['user'])->where('user_id',Auth::user()->id)->orderBy($order, $dir)->offset($pagination['page'])->limit($pagination['perpage'])->get();
            $totalData  = $totalFiltered = WorkRequest::where('user_id',Auth::user()->id)->count();
        }

        $data = array();
        if (!empty($records)) {
            foreach ($records as $key=> $item) {
                    $itemData['image']      = '<img src="'.asset("storage/$item->file").'" width="50" height="50" alt="">';
                    $itemData['title']       = $item->title;
                    $itemData['description']       = substr($item->description,0,10).'...';
                    $itemData['status']     = '<span class="badge '.($item->status=="Active" ? "bg-success" : "bg-danger").'">'.$item->status.'</span>';
                    $itemData['action']     = '<div><a class="" href="'. url("admin/editwork", $item->id) .'/edit">View</a>&nbsp;<a class="del-link" href="javascript:void(0);" data-id="'.$item->id.'">Delete</a></div>';
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

    public function show($id){
        $work = WorkRequest::find($id);
        // return $work;
        return view('work_requests.edit',compact('work'));
    }

    public function edit(Request $request){
        // return $request->all();
        $work = WorkRequest::find($request->id);
        if($work){
            $work->update([
                'link' => $request->link1 ? $request->link1 : $work->link,
                'title' => $request->title ? $request->title : $work->title,
                'description' => $request->description ? $request->description : $work->description,
                'file' => $request->has('file1') ?  Storage::disk('public')->put('work_request',$request->file('file1')) : $work->file,

            ]);
            return redirect()->route('admin.sendWorkRequest');
        }
    }

    public function delete(Request $request){
        $link = WorkRequest::find($request->link_id);
        if($link){
            $link->delete();
            return response()->json(['message' => 'success']);
        }
    }

    public function workRequests(){
        return view('admin_work_requests.index');
    }

    public function workRequestsListing(Request $request) {
        $columns    = array(0 => 'image', 1 => 'link',2 => 'status');
        $order      = 'id'; $dir = 'DESC';

        if ($request->input('order.0.column') != null) {
            $order  = $columns[$request->input('order.0.column')];
            $dir    = $request->input('order.0.dir');
        }
        $totalData  = $totalFiltered = 0;
        $pagination = ['page'=>request()->start,'perpage'=>request()->length];

        if (!empty($request->input('search.value'))) {
            $search         = $request->input('search.value');
            $records        = AdminWorkRequest::with(['user'])->offset($pagination['page'])->limit($pagination['perpage'])->get();
            $totalFiltered  = count($records);
        } else {
            $records    = AdminWorkRequest::with(['user'])->orderBy($order, $dir)->offset($pagination['page'])->limit($pagination['perpage'])->get();
            $totalData  = $totalFiltered = AdminWorkRequest::count();
        }

        $data = array();
        if (!empty($records)) {
            foreach ($records as $key=> $item) {
                    $itemData['name']       = '<input type="checkbox" name="user_id" value="'.$item->id.'" class="select-user" />&nbsp;&nbsp;'.$item->user->name;
                    $itemData['status']     = '<span class="badge '.($item->status=="Approved" ? "bg-success" : "bg-danger").'">'.$item->status.'</span>';
                    $itemData['action']     = '<div><a class="" href="'. url("admin/show-request", $item->id) .'/show">View</a>&nbsp;<a class="del-link" href="javascript:void(0);" data-id="'.$item->id.'">Delete</a></div>';
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

    public function showWhorkRequest(Request $request){
        $work   = AdminWorkRequest::with(['user'])->find($request->id);
        $ids    = [];
        if($work){
            $ids        = explode(',',$work->link_ids);
            $requests   = WorkRequest::whereIn('id',$ids)->get();
        }
        // return $requests;
        return view('admin_work_requests.edit',compact('requests','work'));
    }

    public function approveLink(Request $request){
        $work = WorkRequest::find($request->link_id);
        if($work){
            $work->update([
                'status' => 'Approved'
            ]);
            return response()->json(['message' => 'success']);
        }
    }

    public function ApproveAllRequests(Request $request){
        $adminWork = AdminWorkRequest::whereIn('id',$request->user_ids)->get();
        if(count($adminWork) > 0){
            foreach($adminWork as $wk){
                foreach(explode(',',$wk->link_ids) as $id){
                    $reqs = WorkRequest::find($id);
                    if($reqs){
                        $reqs->update(['status' => 'Approved']);
                    }
                }
                $wk->update([
                    'status' => 'Approved'
                ]);
            }
            return response()->json(['message' => 'success']);
        }
    }
}
