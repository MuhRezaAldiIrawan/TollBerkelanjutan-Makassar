<?php

namespace App\Http\Controllers\Frontend\About;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class StrukturAchievementController extends Controller
{
    //
    public function index(){

    	$banner = DB::table('banner')
    	->where('active','=','1')
        ->where('menu','=','1')
    	->get();

    	$data['judul'] = [
    		'ind'=>'Struktur Organisasi Perusahaan',
    		'eng'=>'Organizational Structure',
    		'ind_1'=>'Sertifikasi & Pencapaian',
    		'eng_1'=>'Certificate & Achievement'
    	];

    	$struktur = db::table('struktur_bsd')->first();

    	$sertifikat = db::table('sertifikat_bsd')->get();

    	return view('frontend/pages/about-us/struktur')
    	->with('data', $data['judul'])
    	->with('sertifikat', $sertifikat)
    	->with('struktur', $struktur)
    	->with('banner', $banner);
    }
}
