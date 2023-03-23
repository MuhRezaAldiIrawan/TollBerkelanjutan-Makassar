<?php

namespace App\Charts\Pelanggaran;

use Illuminate\Support\Facades\DB;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class GateTollBulanan
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    // GETTER

    // tambahkan properti untuk memberi nilai default tahun, bulan dan perusahaan

    // query dan perhitungan data total untuk disajikan ke grafik
    protected function getGraphData($bulan, $lokasi = 'On Ramp Boulevart')
    {   
        $bulan = date('m',strtotime($bulan ));
        // $bulan = date('m');
        // dd($bulan);
        $graph = DB::table('table_counting')
            ->select(DB::raw('lokasi, DAY(`date`) as day, SUM(Mobil) as mobil, SUM(Bus_Truk) as bus_truk, SUM(total) as total'))
            ->whereMonth('date',  $bulan)  
            ->where('lokasi', $lokasi)
            ->groupBy('day', 'lokasi')
            ->get()
            ->toArray();
            // dd($graph); 
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
            return [$mobil, $bus_truk, $total];
    }

    // perhitungan data lhr total
    public function getLhrData($tahun, $bulan, $lokasi )
    {
        $lokasi = request()->query('location');
        // $bulan = date('m',strtotime($bulan ));
        // $tahun = date('y',strtotime($bulan));
        $graph = DB::table('table_counting')
            ->select(DB::raw('lokasi, MONTH(`date`)as month, SUM(total) as total'))
            ->where('lokasi', $lokasi)
            ->whereYear('date', $bulan <= 0 ? $tahun - 1 : $tahun)
            ->whereMonth('date', $bulan)
            ->groupBy('month', 'lokasi')
            ->get()
            ->toArray();
        $a = array();
        
        foreach ($graph as $key => $value) {
            $data = $graph[$key]->total;
            array_push($a, $data);
        }
        // dd($lokasi);

        if ( (count($a)) == 0.0) {
            echo '0';
        } else {
            // $mean = array_sum($a) / (count($a));
            return number_format(round($a[0]), 0, '.', '.');
        }
       
    }

    // public function getGrowth($switch, $year, $bulan, $lokasi = 'On Ramp Boulevart')
    // {
    //     $currLhr = $this->getLhrData($year, $bulan, $lokasi);
        
    //     if ($switch == 'year') {
    //         $prevLhr = $this->getLhrData($year - 1, $bulan, $lokasi);
    //     } elseif ($switch == 'bulan') {
    //         if ($bulan <= 1) {
    //             $prevLhr = $this->getLhrData($year - 1, 12, $lokasi);
    //         } else {
    //             $prevLhr = $this->getLhrData($year, $bulan - 1, $lokasi);
    //         }
    //     }

        

    //     if (  $prevLhr * 100 == 0.0) {
    //         echo 'Divisor is 0';
    //     } else {
    //         $growth = ($currLhr - $prevLhr) / $prevLhr * 100;
    //         return number_format($growth, 1, '.', '.');
    //     }

       
    // }
    public function getDay ($bulan, $lokasi = 'On Ramp Boulevart'){
        $bulan = date('m',strtotime($bulan ));
         $graph = DB::table('table_counting')
         ->select(DB::raw('lokasi, DAY(`date`) as day , SUM(total) as total'))
         ->where('lokasi', $lokasi)
         ->whereMonth('date',  $bulan <= 0 ? 12 : $bulan) 
         ->groupBy('day', 'lokasi')
         ->get()
         ->toArray();
        $a = array();
        foreach ($graph as $key => $value) {
            $data = $graph[$key]->day;
            array_push($a, $data);
        }
        // @dd($a);
        return $a;
    }
    // SETTER
    public function build($bulan, $lokasi = 'On Ramp Boulevart'): \ArielMejiaDev\LarapexCharts\BarChart
    {
        $lineChart = $this->chart->BarChart();
        // @dd(array($this->getGraphData($bulan, $lokasi)[0]->mobil));
        // @dd($this->getGraphData('curr', $year, $bulan, 'On Ramp Boulevart'));
        return $lineChart
            ->addData("Mobil", $this->getGraphData($bulan, $lokasi)[0])
            ->setGrid()
            ->setHeight(400)
            ->addData("Bus dan Truk", $this->getGraphData($bulan, $lokasi)[1])
            ->addData("Total", $this->getGraphData($bulan, $lokasi)[2])
            ->setFontFamily('poppins')
            ->setColors(['#ED1A24', '#25507D','#10707A'])
            ->setXAxis($this->getDay($bulan, $lokasi));
    }
}
