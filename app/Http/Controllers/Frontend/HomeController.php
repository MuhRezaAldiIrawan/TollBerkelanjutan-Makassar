<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{

    public function index()
    {
    	$banner = DB::table('banner')
    	->where('active','=','1')
    	->get();

    	
        return view('frontend/pages/home')
        ->with('banner', $banner);
    }

}
