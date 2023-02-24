<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class CallCenterController extends Controller
{
    //
    public function index(){

        $call_center = db::table('call_center')->get();

        $call_center_child = db::table('call_center_child')->get();

    	return view('frontend/pages/call-center')
        ->with('call_center', $call_center)
        ->with('call_center_child', $call_center_child);

    }
}
