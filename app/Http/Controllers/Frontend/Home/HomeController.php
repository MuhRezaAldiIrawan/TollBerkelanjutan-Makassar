<?php

namespace App\Http\Controllers\Frontend\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{

    public function index()
    {
    	$banner = DB::table('banner')
    	->where('active','=','1')
        ->where('menu','=','1')
    	->get();

        $info = db::table('menu')->leftJoin('icon','menu.icon','=','icon.id')->select('menu.id as id', 'menu.menu as menu', 'menu.icon as icon_id', 'menu.route as route','icon.class as cl')->where('add_to_home','=','1')->get();

    	$nearby = db::table('service_location')->limit(4)->get();

        $media = db::table('media')->where('add_to_home','=','1')->get();

        $infotarif = db::table('info_tarif')->get();

        return view('frontend/pages/home/home')
        ->with('banner', $banner)
        ->with('nearby', $nearby)
        ->with('media', $media)
        ->with('infotarif', $infotarif)
        ->with('info', $info);
        // return view('errors/maintenance');
    }

}
