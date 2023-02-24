<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;	
use DB,PDF;

class StrukController extends Controller
{
    public function index(Request $request){
    	if(request()->ajax()){
			if(!empty($request->kartu)){
			
				$kartu = $request->kartu;
			
				$data = Http::get('http://emestech.host:1771/api/resi_web.php?cid='.$kartu);
				$datas = $data->json();
				$dataa = $datas['data'];
			 
			}
			return datatables()->of($dataa)->make(true);
		}

    	return view('frontend/pages/struk');
    }
	// public function index(){
 //    	return view('frontend/pages/struk');
 //    }

  //   public function cari(Request $request){
  //   	$kartu = $request->kartu;
		// $tanggal_awal = $request->from;
		// $tanggal_akhir = $request->to;

  //   	$data = DB::table('tes_data_transaksi')->where('kartu', $kartu)->whereBetween('tanggal', array($tanggal_awal,$tanggal_akhir))->paginate(5);
  //   	return view('frontend/pages/struk', compact('data'));
  //   }

    public function cetak_data_transaksi(){
		$kartu = $request->kartu;
		$tanggal_awal = $request->from;
		$tanggal_akhir = $request->to;
		
		$data = DB::table('tes_data_transaksi')->where('kartu', '7546060002436566')->whereBetween('tanggal', array('2021-01-01','2021-07-22'))->get();
		
		$pdf = PDF::loadview('frontend/pages/data-transaksi',['data'=>$data]);
		
		return $pdf->download('data-transaksi.pdf');
	}

	public function tes(Request $request){
		$data = $request->data;
		$jml = $request->jml;

		$datas = json_decode($data,true);

		// for($x=0; $x<$jml; $x++){
		// 	$datass = $datas[$x];
		// }
		// dd($data);
		$pdf = PDF::loadview('frontend/pages/data-transaksi',['datas'=>$datas, 'jml'=>$jml])->setPaper('a6', 'landscape');
		// return $pdf->stream();

		$path = public_path('pdf/');

		$filename = 'data-transaksi_'.date('YmdHis').'.pdf';

		$url = url('/')."/pdf/".$filename;

		$pdf->save($path.'/'.$filename);

		$pdf = asset('pdf/'.$filename);
		
		// return response()->download($pdf);
		// $res = array(
		// 	"url"=>$path,
		// 	"file"=>$filename
		// );
		return response()->json([
			"url"=>$url,
			"file"=>$filename
		]);
	}

	public function indexxx(Request $request){
		if(request()->ajax()){
			if(!empty($request->kartu)){
				$kartu = $request->kartu;
			
				$data = Http::get('http://emestech.host:1771/api/resi_web.php?cid='.$kartu);
				$datas = $data->json();
				$dataa = $datas['data'];
			 
			}
			return datatables()->of($dataa)->make(true);
		}

		return view('struk-mks');
	}
}
