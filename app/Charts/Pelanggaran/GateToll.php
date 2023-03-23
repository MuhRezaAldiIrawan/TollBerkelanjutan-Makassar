<?php

namespace App\Charts\Pelanggaran;

use Illuminate\Support\Facades\DB;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class GateToll
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    // GETTER

    // tambahkan properti untuk memberi nilai default tahun, bulan dan perusahaan

    // query dan perhitungan data total untuk disajikan ke grafik
    protected function getGraphData($tanggal, $lokasi = 'On Ramp Boulevart')
    {   
        $tanggal = $tanggal ?? date('Y-m-d');
        
        $graph = DB::table('table_counting')
            ->select(DB::raw('lokasi, HOUR(`date`) as hour, SUM(Mobil) as mobil, SUM(Bus_Truk) as bus_truk, SUM(total) as total'))
            ->whereDate('date',  $tanggal)  
            ->where('lokasi', $lokasi)
            ->groupBy('date', 'lokasi')
            ->get()
            ->toArray();
            $mobil = array();
            $bus_truk = array();
            $total = array();
            foreach ($graph as $key => $value) {
                $mb = $graph[$key]->mobil;
                $bt = $graph[$key]->bus_truk;
                $t = $graph[$key]->total;
                array_push($mobil, $mb);
                array_push($bus_truk, $bt);
                array_push($total, $t);
            }
            return [$mobil, $bus_truk,$total];
    }

    // perhitungan data lhr total
    public function getData($tanggal, $lokasi )
    {
        $tanggal = request()->query('tanggal');
        $lokasi =  request()->query('location');
        $graph = DB::table('table_counting')
            ->select(DB::raw('lokasi, DAY(`date`) as day, SUM(total) as total'))
            ->where('lokasi', $lokasi)
            ->whereDate('date',  $tanggal)  
            ->groupBy('day', 'lokasi')
            ->get()
            ->toArray();
        $a = array();
        foreach ($graph as $key => $value) {
            $data = $graph[$key]->total;
            array_push($a, $data);
        }
        

        if ( (count($a)) == 0.0) {
            echo 'Divisor is 0';
        } else {
            return number_format(round($a[0]));
        }
       
    }

    // public function getGrowth($switch, $year, $month, $lokasi = 'On Ramp Boulevart')
    // {
    //     $currLhr = $this->getLhrData($year, $month, $lokasi);
        
    //     if ($switch == 'year') {
    //         $prevLhr = $this->getLhrData($year - 1, $month, $lokasi);
    //     } elseif ($switch == 'month') {
    //         if ($month <= 1) {
    //             $prevLhr = $this->getLhrData($year - 1, 12, $lokasi);
    //         } else {
    //             $prevLhr = $this->getLhrData($year, $month - 1, $lokasi);
    //         }
    //     }

        

    //     if (  $prevLhr * 100 == 0.0) {
    //         echo 'Divisor is 0';
    //     } else {
    //         $growth = ($currLhr - $prevLhr) / $prevLhr * 100;
    //         return number_format($growth, 1, '.', '.');
    //     }

       
    // }

    public function getDay ($tangal, $lokasi = 'On Ramp Boulevart'){
        $tanggal = $tangal ?? date('Y-m-d');
         $graph = DB::table('table_counting')
         ->select(DB::raw('lokasi, HOUR(`date`) as hour , SUM(total) as total'))
         ->where('lokasi', $lokasi)
         ->whereDate('date',  $tanggal) 
         ->groupBy('hour', 'lokasi')
         ->get()
         ->toArray();
        $a = array();
        foreach ($graph as $key => $value) {
            $data = $graph[$key]->hour;
            array_push($a, $data);
        }
        // @dd($a);
        return $a;
    }
    // SETTER
    public function build($tanggal, $lokasi = 'On Ramp Boulevart'): \ArielMejiaDev\LarapexCharts\BarChart
    {
        $lineChart = $this->chart->BarChart();
        // @dd(array($this->getGraphData($start,$end, $lokasi)[0]->mobil));
        // @dd($this->getGraphData('curr', $year, $month, 'On Ramp Boulevart'));
        return $lineChart
            ->addData("Mobil", $this->getGraphData($tanggal, $lokasi)[0])
            ->setGrid()
            ->setHeight(400)
            ->addData("Bus dan Truk", $this->getGraphData($tanggal, $lokasi)[1])
            ->addData("Total", $this->getGraphData($tanggal, $lokasi)[2])
            ->setFontFamily('poppins')
            ->setColors(['#ED1A24', '#25507D', '#122424'])
            ->setXAxis($this->getDay($tanggal, $lokasi));
    }
}
