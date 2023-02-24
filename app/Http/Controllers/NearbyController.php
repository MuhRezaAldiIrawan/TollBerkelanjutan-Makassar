<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class NearbyController extends Controller
{

    public function index()
    {
    	$nearby = DB::table('service_location')
    	->where('active','=','1')
    	->get();

        $nearby_1 = DB::table('service_location')
        ->where('active','=','1')
        ->where('kategori', '=', '1')
        ->get();

        $nearby_2 = DB::table('service_location')
        ->where('active','=','1')
        ->where('kategori', '=', '2')
        ->get();

        $nearby_3 = DB::table('service_location')
        ->where('active','=','1')
        ->where('kategori', '=', '3')
        ->get();

        $nearby_4 = DB::table('service_location')
        ->where('active','=','1')
        ->where('kategori', '=', '4')
        ->get();

        $nearby_5 = DB::table('service_location')
        ->where('active','=','1')
        ->where('kategori', '=', '5')
        ->get();

        $kategori = DB::table('kategori')->get();
    	
        return view('frontend/pages/nearby')
        ->with('nearby', $nearby)
        ->with('nearby_1', $nearby_1)
        ->with('nearby_2', $nearby_2)
        ->with('nearby_3', $nearby_3)
        ->with('nearby_4', $nearby_4)
        ->with('nearby_5', $nearby_5)
        ->with('kategori', $kategori);
    }

    public function getDetailNearby($id)
    {
    	$nearby = DB::table('service_location')
    	->where('active','=','1')
    	->get();

    	$detail = DB::table('service_place')
	        ->join('service_location', 'service_place.service_location_id','=','service_location.id')
	        ->select('service_place.*')
	        ->where('service_place.service_location_id',$id)
	        ->get();

	    $data['index'] = $nearby;
	    $data['row'] = $detail;
	    $data['index'] = $nearby;

	    return view('frontend/pages/nearby_detail',$data);

    }

}
