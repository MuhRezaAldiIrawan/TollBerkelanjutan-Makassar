<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class AboutController extends Controller
{
    //
    public function index(){

    	$about = db::table('about')->where('id', 1)->first();
    	$visi = db::table('visi_misi')->first();
    	$timeline_date_first = db::table('timeline')->where('status', 1)->where('id',1)->first();
    	$timeline_date = db::table('timeline')->where('status', 1)->where('id', '!=', 1)->orderby('tanggal', 'asc')->get();
    	$timeline_first = db::table('timeline')->where('status', 1)->where('id', '=', 1)->first();
    	$timeline = db::table('timeline')->where('status', 1)->where('id', '!=', 1)->orderby('tanggal', 'asc')->get();

    	return view('frontend/pages/about')
    	->with('about', $about)
    	->with('visi', $visi)
    	->with('timeline_date', $timeline_date)
    	->with('timeline', $timeline)
    	->with('timeline_date_first', $timeline_date_first)
    	->with('timeline_first', $timeline_first);

    }
}
