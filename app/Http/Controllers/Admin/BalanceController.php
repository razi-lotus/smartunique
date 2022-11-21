<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BalanceRequest;
use App\Models\Balances;
use Illuminate\Http\Request;

class BalanceController extends Controller
{

    public function add(BalanceRequest $request){
        // return $request->all();
        $data = Balances::create($request->prepaireRequest());
        return response()->json($data);
    }
}
