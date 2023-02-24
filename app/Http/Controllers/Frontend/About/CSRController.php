<?php

namespace App\Http\Controllers\Frontend\About;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class CSRController extends Controller
{
    //
    public function index(){

    	$banner = DB::table('banner')
    	->where('active','=','1')
        ->where('menu','=','1')
    	->get();

    	$data['judul'] = [
    		'ind'=>'Tanggung Jawab Operasional',
    		'eng'=>'Corporate Social Responsibility'
    	];

    	$csr = db::table('media')->where('kategori_media','=','1')->orderBy('created_at', 'DESC')->get();

    	return view('frontend/pages/about-us/csr')
    	->with('data', $data['judul'])
    	->with('csr', $csr)
    	->with('banner', $banner);

    }
}
