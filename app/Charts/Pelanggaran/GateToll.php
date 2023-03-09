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
    protected function getGraphData($start, $end, $lokasi = 'On Ramp Boulevart')
    {   
        $start_date = $start ?? date('Y-m-d');
        $end_date = $end ?? date('Y-m-d');
        $graph = DB::table('table_counting')
            ->select(DB::raw('lokasi, SUM(Mobil) as mobil, SUM(Bus_Truk) as bus_truk, `date`, SUM(total) as total','date(date) as day'))
            ->whereBetween('date',   [$start_date, $end_date])  
            ->where('lokasi', $lokasi)
            ->groupBy('date', 'lokasi')
            ->get()
            ->toArray();
            $mobil = array();
            $bus_truk = array();
            foreach ($graph as $key => $value) {
                $mb = $graph[$key]->mobil;
                $bt = $graph[$key]->bus_truk;
                array_push($mobil, $mb);
                array_push($bus_truk, $bt);
            }
            return [$mobil, $bus_truk];
    }

    // perhitungan data lhr total
    public function getLhrData($year, $month, $lokasi = 'On Ramp Boulevart')
    {
        $graph = DB::table('table_counting')
            ->select(DB::raw('lokasi, `date`, SUM(total) as total'))
            ->where('lokasi', $lokasi)
            ->whereYear('date', $month <= 0 ? $year - 1 : $year)
            ->whereMonth('date', $month <= 0 ? 12 : $month)
            ->groupBy('date', 'lokasi')
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
            $mean = array_sum($a) / (count($a));
            return number_format(round($mean), 0, '.', '.');
        }
       
    }

    public function getGrowth($switch, $year, $month, $lokasi = 'On Ramp Boulevart')
    {
        $currLhr = $this->getLhrData($year, $month, $lokasi);
        
        if ($switch == 'year') {
            $prevLhr = $this->getLhrData($year - 1, $month, $lokasi);
        } elseif ($switch == 'month') {
            if ($month <= 1) {
                $prevLhr = $this->getLhrData($year - 1, 12, $lokasi);
            } else {
                $prevLhr = $this->getLhrData($year, $month - 1, $lokasi);
            }
        }

        

        if (  $prevLhr * 100 == 0.0) {
            echo 'Divisor is 0';
        } else {
            $growth = ($currLhr - $prevLhr) / $prevLhr * 100;
            return number_format($growth, 1, '.', '.');
        }

       
    }

    public function getDay ($start, $end, $lokasi = 'On Ramp Boulevart'){
        $start_date = $start ?? date('Y-m-d');
        $end_date = $end ?? date('Y-m-d');
         $graph = DB::table('table_counting')
         ->select(DB::raw('lokasi, `date`, SUM(total) as total','date(date) as day'))
         ->where('lokasi', $lokasi)
         ->whereBetween('date',  [$start_date , $end_date]) 
         ->groupBy('date', 'lokasi')
         ->get()
         ->toArray();
        $a = array();
        foreach ($graph as $key => $value) {
            $data = $graph[$key]->date;
            array_push($a, $data);
        }
        // @dd($a);
        return $a;
    }
    // SETTER
    public function build($start, $end, $lokasi = 'On Ramp Boulevart'): \ArielMejiaDev\LarapexCharts\BarChart
    {
        $lineChart = $this->chart->BarChart();
        // @dd(array($this->getGraphData($start,$end, $lokasi)[0]->mobil));
        // @dd($this->getGraphData('curr', $year, $month, 'On Ramp Boulevart'));
        return $lineChart
            ->addData("Mobil", $this->getGraphData($start,$end, $lokasi)[0])
            ->setGrid()
            ->setHeight(400)
            ->addData("Bus dan Truk", $this->getGraphData($start,$end, $lokasi)[1])
            ->setFontFamily('poppins')
            ->setColors(['#ED1A24', '#25507D'])
            ->setXAxis($this->getDay($start,$end, $lokasi));
    }
}
