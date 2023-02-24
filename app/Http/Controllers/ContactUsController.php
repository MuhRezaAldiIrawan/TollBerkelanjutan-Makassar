<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ContactUsController extends Controller
{
    //
    public function index(){

    	$info_tol = db::table('info_tol')->leftJoin('icon','info_tol.icon','=','icon.id')->select('info_tol.id as id', 'info_tol.judul as judul', 'info_tol.icon as icon_id', 'info_tol.link as link', 'icon.class as cl','info_tol.btn as btn')->where('active',1)->get();

    	$alamat_1 = db::table('alamat_1')->first();

        $banner = db::table('banner')->where('active',1)->get();

    	return view('frontend/pages/contact-us')
    	->with('info', $info_tol)
    	->with('alamat1', $alamat_1)
        ->with('banner', $banner);

    }
}
