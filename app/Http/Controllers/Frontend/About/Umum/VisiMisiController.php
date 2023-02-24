<?php

namespace App\Http\Controllers\Frontend\About\Umum;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class VisiMisiController extends Controller
{
    //
    public function index(){

    	$banner = DB::table('banner')
    	->where('active','=','1')
        ->where('menu','=','1')
    	->get();

    	$data['judul'] = [
    		'ind'=>'Visi & Misi Perusahaan',
    		'eng'=>'Vision & Mision',
    		'nil_indo'=>'Nilai Perusahaan',
    		'nil_eng'=>'Company Value',
            'kebijakan'=>'Kebijakan Manajemen Sistem'
    	];

    	$visimisi = db::table('visi_misi')->first();

    	$nilai = db::table('nilai_bsd')->where('active','=','1')->get();

    	return view('frontend/pages/about-us/umum/visi-misi')
		->with('data', $data['judul'])
		->with('visimisi', $visimisi)
		->with('nilai', $nilai)
    	->with('banner', $banner);

    }
}
