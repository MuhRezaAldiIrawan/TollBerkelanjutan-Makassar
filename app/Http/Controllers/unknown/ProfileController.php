<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

class ProfileController extends Controller
{
    //
    public function index(){
		
		$direktur = db::table('profile')->where('position', 3)->where('status', 1)->get();
		$dirut = db::table('profile')->where('position', 2)->where('status', 1)->get();
    	
		return view('frontend/pages/profile')
		->with('direktur', $direktur)
		->with('dirut', $dirut);

    }
}
