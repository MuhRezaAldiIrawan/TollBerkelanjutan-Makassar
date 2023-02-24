<?php

namespace App\Http\Controllers\Frontend\About;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class DewanController extends Controller
{
    //
    public function index(){

    	$banner = DB::table('banner')
    	->where('active','=','1')
    	->get();

    	$data['judul'] = [
    		'ind'=>'Dewan Komisaris & Direksi',
    		'eng'=>'Board Commissioner & Directors'
    	];

    	$komisaris_first = db::table('dewan')
		->leftJoin('kategori_posisi','dewan.kategori_posisi', '=', 'kategori_posisi.id')
		->select(
			'dewan.id as id',
			'dewan.nama as nama',
			'kategori_posisi.posisi as posisi',
			'dewan.nomor as nomor',
			'dewan.image as image',
			'dewan.active as active',
			'dewan.deskripsi as deskripsi',
			'dewan.kategori_parent as kategori_parent',
			)
		->where('dewan.kategori_parent','=','1')
		->where('active','=', '1')
		->first();

    	$komisaris = db::table('dewan')
		->leftJoin('kategori_posisi','dewan.kategori_posisi', '=', 'kategori_posisi.id')
		->select(
			'dewan.id as id',
			'dewan.nama as nama',
			'kategori_posisi.posisi as posisi',
			'dewan.nomor as nomor',
			'dewan.image as image',
			'dewan.active as active',
			'dewan.deskripsi as deskripsi',
			'dewan.kategori_parent as kategori_parent',
			)
		->where('dewan.kategori_parent','=','1')
		->where('kategori_posisi','=', '2')
		->where('active','=', '1')
		->get();

    	$direksi_first = db::table('dewan')
		->leftJoin('kategori_posisi','dewan.kategori_posisi', '=', 'kategori_posisi.id')
		->select(
			'dewan.id as id',
			'dewan.nama as nama',
			'kategori_posisi.posisi as posisi',
			'dewan.nomor as nomor',
			'dewan.image as image',
			'dewan.active as active',
			'dewan.deskripsi as deskripsi',
			'dewan.kategori_parent as kategori_parent',
			)
		->where('dewan.kategori_parent','=','2')
		->where('kategori_posisi','=', '3')
		->where('active','=', '1')
		->first();

    	$direksi = db::table('dewan')
		->leftJoin('kategori_posisi','dewan.kategori_posisi', '=', 'kategori_posisi.id')
		->select(
			'dewan.id as id',
			'dewan.nama as nama',
			'kategori_posisi.posisi as posisi',
			'dewan.nomor as nomor',
			'dewan.image as image',
			'dewan.active as active',
			'dewan.deskripsi as deskripsi',
			'dewan.kategori_parent as kategori_parent',
			)
		->where('dewan.kategori_parent','=','2')
		->where('dewan.kategori_posisi','=', '4')
		->where('active','=', '1')
		->get();

		$data_id = db::table('dewan')->get();

    	return view('frontend/pages/about-us/dewan')
    	->with('data', $data['judul'])
    	->with('komisaris_first', $komisaris_first)
    	->with('komisaris', $komisaris)
    	->with('direksi_first', $direksi_first)
    	->with('direksi', $direksi)
    	->with('banner', $banner)
    	->with('data_id', $data_id);

    }
}
