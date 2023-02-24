<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class MaintenanceController extends Controller
{

    public function index()
    {
    	return view('errors/maintenance');
    }

}
