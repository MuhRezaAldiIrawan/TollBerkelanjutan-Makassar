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
    protected function getGraphData($switch = 'curr', $year, $month, $lokasi = 'On Ramp Boulevart')
    {
        if ($switch == 'curr') {
            $graph = DB::table('table_counting')
                ->select(DB::raw('lokasi, `date`, SUM(total) as total','date(date) as day'))
                ->where('lokasi', $lokasi)
                ->whereYear('date', $year)
                ->whereMonth('date', $month)
                ->groupBy('date', 'lokasi')
                ->get()
                ->toArray();
                // @dd($graph);
            $a = array();
            foreach ($graph as $key => $value) {
                $data = $graph[$key]->total;
                array_push($a, $data);
            }
            return array_map('intval', $a);
        } elseif ($switch == 'prev') {
            $date = DB::table('table_counting')
                ->where('lokasi', $lokasi)
                ->whereYear('date', $year)
                ->whereMonth('date', $month)
                ->select(DB::raw('date(date) as day'))
                ->groupBy('date')
                ->get()
                ->last();
                $countDay = date('d', strtotime($date->day));
            $a = array();
            for ($day = 1; $day <= ($countDay); $day++) {
                $graph = DB::table('table_counting')
                    ->where('lokasi', $lokasi)
                    ->whereDate('date', date('Y-m-d', strtotime($year . '-' . $month . '-' . $day . ' -364 days')))
                    ->sum('total');
                array_push($a, $graph);
            }

            return array_map('intval', $a);
        }
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

    public function getDay ($year, $month, $lokasi = 'On Ramp Boulevart'){
         $graph = DB::table('table_counting')
         ->select(DB::raw('lokasi, `date`, SUM(total) as total','date(date) as day'))
         ->where('lokasi', $lokasi)
         ->whereYear('date', $year)
         ->whereMonth('date', $month)
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
    public function build($year, $month): \ArielMejiaDev\LarapexCharts\BarChart
    {
        $lineChart = $this->chart->BarChart();
        // @dd($this->getDay($year, $month, 'On Ramp Boulevart'));
        // @dd($this->getGraphData('curr', $year, $month, 'On Ramp Boulevart'));
        return $lineChart
            ->addData("Mobil", $this->getGraphData('curr', $year, $month, 'On Ramp Boulevart'))
            ->setGrid()
            ->setHeight(400)
            ->addData("Bus dan Truk", $this->getGraphData('curr', $year, $month, 'On Ramp Boulevart'))
            ->setFontFamily('poppins')
            ->setColors(['#ED1A24', '#25507D'])
            ->setMarkers(['#ED1A24', '#25507D'], 7, 10)
            ->setXAxis($this->getDay($year, $month, 'On Ramp Boulevart'));
    }
}
