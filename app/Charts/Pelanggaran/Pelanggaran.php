<?php

namespace App\Charts\Pelanggaran;

use Illuminate\Support\Facades\DB;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class Pelanggaran
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    // GETTER

    // tambahkan properti untuk memberi nilai default tahun, bulan dan perusahaan

    // query dan perhitungan data total untuk disajikan ke grafik
    public function getTotal($bulan, $pelanggaran = "Melawan Arus")
    {   
        $bulan = date('m',strtotime($bulan ));

        $graph = DB::table('data_pelanggaran')
            ->select(DB::raw('JENIS_PELANGGARAN, DAY(`WAKTU`) as day'))
            ->whereMonth('WAKTU', '02')  
            ->where('JENIS_PELANGGARAN', $pelanggaran)
            ->count();

            return $graph;
    }

    public function getDataPelanggaran ($bulan, $pelanggaran = 'Melawan Arus'){
        $bulan = date('m',strtotime($bulan ));
         $graph = DB::table('data_pelanggaran')
         ->select(DB::raw('JENIS_PELANGGARAN, DAY(`WAKTU`) as day, COUNT(`id`) as total'))
         ->where('JENIS_PELANGGARAN', $pelanggaran)
         ->whereMonth('WAKTU',  '02' <= 0 ? 12 : '02') 
        //  ->whereMonth('WAKTU',  $bulan <= 0 ? 12 : $bulan) 
         ->groupBy('day', 'JENIS_PELANGGARAN', )
         ->get()
         ->toArray();

         $day = array();
         $dataCounts = array();
         foreach ($graph as $key => $value) {
             $data = $graph[$key]->day;
             array_push($day, $data);
             $total = $graph[$key]->total;
             array_push($dataCounts, $total);
            }
        return[$day, $dataCounts];
    }
    // SETTER
    public function build($bulan, $pelanggaran = 'Melawan Arus'): \ArielMejiaDev\LarapexCharts\BarChart
    {
        $lineChart = $this->chart->BarChart();

        return $lineChart
            ->addData("Melawan Arus", $this->getDataPelanggaran($bulan, $pelanggaran)[1])
            ->setGrid()
            ->setHeight(400)
            ->setFontFamily('poppins')
            ->setColors(['#ED1A24'])
            ->setXAxis($this->getDataPelanggaran($bulan, $pelanggaran)[0]);
    }
}
