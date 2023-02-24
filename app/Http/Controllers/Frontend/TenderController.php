<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class TenderController extends Controller
{
    //
    public function index(){
    	$data = db::table('tender')->get();

    	return view('frontend/pages/tender')->with('data',$data);
    }

    public function detail($id){

    	$tender = db::table('tender')->where('id', $id)->first();

    	return view('frontend/pages/tender-detail')->with('tender', $tender);

    }
}
