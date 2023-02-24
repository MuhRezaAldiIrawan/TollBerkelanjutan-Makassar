<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class TesController extends Controller
{

    public function index()
    {	
        return view('toko-layout/index');
    }

}
