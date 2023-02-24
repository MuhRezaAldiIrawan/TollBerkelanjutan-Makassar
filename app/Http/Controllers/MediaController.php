<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class MediaController extends Controller
{
    //
    public function index(){

    	$media = db::table('media')->orderBy('created_at','desc')->where('kategori_media','=','2')->get();

    	return view('frontend/pages/media')->with('medias',$media);

    }

    public function detail($id){

    	$media = db::table('media')->where('id', $id)->first();

    	return view('frontend/pages/media-detail')->with('media', $media);

    }
}
