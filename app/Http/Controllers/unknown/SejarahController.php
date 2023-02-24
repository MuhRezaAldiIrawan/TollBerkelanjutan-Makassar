<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class SejarahController extends Controller
{
    //
    public function index(){

    	$banner = DB::table('banner')
    	->where('active','=','1')
    	->get();

    	return view('frontend/pages/about-us/sejarah')->with('banner', $banner);
    }
}
