<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session, DB, Auth,Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $id = Auth::user()->id;
        // dd($id);
        // $id = Session::get('id');

        $data_alamat = DB::table('user_detail')->where('user_id',$id)->first();

        $data_kartu = DB::table('user_kartu')
        ->select('user_id','user_kartu.kartu','kartu_all_time.jumlah_transaksi','bank_data.bank')
        ->leftJoin('kartu_all_time','user_kartu.kartu','=','kartu_all_time.kartu')
        ->leftJoin('bank_data','user_kartu.bank','=','bank_data.id')
        ->where('user_id',$id)->get();
        
        $total = array();
        foreach($data_kartu as $d){
            $total[] = $d->jumlah_transaksi;
        }

        return view('home')->with('data_alamat',$data_alamat)->with('data_kartu',$data_kartu)->with('total',array_sum($total));
    }

    public function update(Request $request){
        $id = $request->id;
        $alamat = $request->alamat;
        $telpon = $request->telpon;
        // $password = $request->password;

        if(!is_null($request->password)){
            $password = Hash::make($request->password);
            DB::table('users')->where('id', $id)->update(['password'=>$password]);
        }

        if(!is_null($alamat) && !is_null($telpon)){
            DB::table('user_detail')->where('user_id',$id)->update(['alamat'=>$alamat,'no_telp'=>$telpon]);
        }elseif(!is_null($alamat) && is_null($telpon)){
            DB::table('user_detail')->where('user_id',$id)->update(['alamat'=>$alamat]);
        }elseif(is_null($alamat) && !is_null($telpon)){
            DB::table('user_detail')->where('user_id',$id)->update(['no_telp'=>$telpon]);
        }

        return redirect()->route('home')->with(['success'=>'sukses update data']);
    }
}
