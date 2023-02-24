<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class KartuController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request){

    	$id = $request->id;
    	$kartu = $request->kartu;

    	for($i = 0;$i<count($kartu); $i++){
    		$data = [
    			'user_id'=>$id,
    			'kartu'=>$kartu[$i]
    		];

    		DB::table('user_kartu')->insert($data);
    	}

    	return redirect()->route('home')->with(['success'=>'Berhasil simpan data']);
    }

    public function edit_profile($id){
        $data = DB::table('user_detail')->select('alamat','no_telp')->where('user_id',$id)->get();
        $data->toJson();

        echo($data);
    }
}
