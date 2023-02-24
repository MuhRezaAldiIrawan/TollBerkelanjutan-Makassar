<?php

namespace App\Http\Controllers\Frontend\About\Umum;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class SejarahController extends Controller
{
    //
    public function index(){

    	$banner = DB::table('banner')
    	->where('active','=','1')
    	->where('menu','=','1')
    	->get();

    	$data['judul'] = [
    		'ind'=>'Sejarah Perusahaan',
    		'eng'=>'Business Milestone'
    	];

    	$sejarah = db::table('sejarah_perusahaan')->where('active','=','1')->orderBy('tanggal', 'asc')->get();

    	return view('frontend/pages/about-us/umum/sejarah')
    	->with('data',$data['judul'])
    	->with('sejarah',$sejarah)
    	->with('banner', $banner);
    }
}
