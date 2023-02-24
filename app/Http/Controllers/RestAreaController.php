<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class RestAreaController extends Controller
{
    //
    public function index(){

    	$rest = db::table('rest_area')->first();

    	$detail = db::table('rest_area_child')->get();

    	$data['judul'] = [
    		'ind'=>'Tempat Istirahat & Pelayanan',
    		'eng'=>'Rest Area & Service'
    	];

    	return view('frontend/pages/rest-area')
    	->with('data',$data['judul'])
    	->with('rest', $rest)
    	->with('detail', $detail);

    }
}
