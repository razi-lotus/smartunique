<?php

namespace App\Http\Controllers;

use App\Models\AdminWorkRequest;
use App\Models\WorkRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class WorkController extends Controller
{
    public function index(){
        return view('work_requests.index');
    }

    public function saveWork(Request $request){
        // return $request->get('link1');
        // if($request->has('files')){
            $work_ids = [];
            for($i=1;$i<=5;$i++){
                $work = WorkRequest::create([
                    'user_id'   => Auth::user()->id,
                    'file'      => $request->has('file'.$i) ? Storage::disk('public')->put('work_request',$request->file('file'.$i)) : null,
                    'link'      => $request->get('link'.$i),
                    'status'    => 'Pending'
                ]);
                $work_ids[] = $work->id;
            }
            AdminWorkRequest::create([
                'user_id'   => Auth::user()->id,
                'link_ids'  => implode(',',$work_ids),
                'status'    => 'Pending'
            ]);

        return redirect()->route('admin.sendWorkRequest');
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
            $records        = WorkRequest::with(['user'])->where('user_id',Auth::user()->id)->offset($pagination['page'])->limit($pagination['perpage'])->get();
            $totalFiltered  = count($records);
        } else {
            $records    = WorkRequest::with(['user'])->where('user_id',Auth::user()->id)->orderBy($order, $dir)->offset($pagination['page'])->limit($pagination['perpage'])->get();
            $totalData  = $totalFiltered = WorkRequest::where('user_id',Auth::user()->id)->count();
        }

        $data = array();
        if (!empty($records)) {
            foreach ($records as $key=> $item) {
                    $itemData['image']      = '<img src="'.asset("storage/$item->file").'" width="50" height="50" alt="">';
                    $itemData['link']       = substr($item->link,0,30).'...';
                    $itemData['status']     = '<span class="badge '.($item->status=="Approved" ? "bg-success" : "bg-danger").'">'.$item->status.'</span>';
                    $itemData['action']     = '<div><a class="" href="'. url("admin/editwork", $item->id) .'/edit">Edit</a>&nbsp;<a class="del-link" href="javascript:void(0);" data-id="'.$item->id.'">Delete</a></div>';
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
                'file' => $request->has('file1') ?  Storage::disk('public')->put('work_request',$request->file('file1')) : $request->file
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
