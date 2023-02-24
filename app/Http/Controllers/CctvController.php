<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class CctvController extends Controller
{
    //
    public function index(Request $request){
    	$channel = DB::table('cctv_list')->select('name')->get();
        $name = $request->name;
        $rtsp = DB::table('cctv_list')->where('name', $name)->get();

    	return view('frontend/pages/cctv', compact('channel','rtsp'));
    }
    

	public function indexx(Request $request)
    {
        $channel = DB::table('cctv_list')->select('name')->get();
        $name = $request->name;
        $rtsp = DB::table('cctv_list')->where('name', $name)->get();
        return view('index', compact('channel','rtsp'));
    }
}
