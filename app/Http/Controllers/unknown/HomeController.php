<?php

namespace App\Http\Controllers;

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

        $info = db::table('info_tol')->leftJoin('icon','info_tol.icon','=','icon.id')->select('info_tol.id as id', 'info_tol.judul as judul', 'info_tol.icon as icon_id', 'info_tol.link as link', 'icon.class as cl',)->get();

    	$nearby = db::table('service_location')->limit(4)->get();

        $media = db::table('media')->get();

        return view('frontend/pages/home')
        ->with('banner', $banner)
        ->with('nearby', $nearby)
        ->with('media', $media)
        ->with('info', $info);
    }

}
