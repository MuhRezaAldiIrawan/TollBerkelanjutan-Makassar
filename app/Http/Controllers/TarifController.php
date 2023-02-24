<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class TarifController extends Controller
{

    public function index()
    {
    	$tarif = DB::table('info_tarif')
    	->get();
    	
        return view('frontend/pages/tarif')
        ->with('tarif', $tarif);
    }

}
