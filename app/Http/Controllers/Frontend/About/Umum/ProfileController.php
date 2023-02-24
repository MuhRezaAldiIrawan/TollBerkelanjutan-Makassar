<?php

namespace App\Http\Controllers\Frontend\About\Umum;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class ProfileController extends Controller
{
    //
    public function index(){

    	$banner = DB::table('banner')
    	->where('active','=','1')
        ->where('menu','=','1')
    	->get();

    	$data['judul'] = [
    		'ind'=>'Profil Perusahaan',
    		'eng'=>'Company Profile'
    	];

    	$profile_bsd = db::table('profile_bsd')->first();
        $sertifikat = db::table('sertifikat_bsd')->get();

    	return view('frontend/pages/about-us/umum/profile')
    	->with('data', $data['judul'])
    	->with('profile_bsd', $profile_bsd)
        ->with('sertifikat', $sertifikat)
    	->with('banner', $banner);

    }
}
