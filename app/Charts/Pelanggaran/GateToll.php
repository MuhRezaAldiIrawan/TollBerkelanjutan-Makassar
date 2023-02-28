<?php

namespace App\Charts\Pelanggaran;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use Illuminate\Support\Facades\DB;

class GateToll
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function getGraphData($switch, $time = 'curr', $year, $month)
    {
        if ($time == 'curr') {
            $data = DB::table('grb_kalukubadoa')
            // ->where('company', 'MMN')
            ->whereYear('date', $year)
            ->whereMonth('date', $month)
            ->select(DB::raw('Mobil,Bus_Truk, sum(total) as total'))
            ->groupBy('Mobil','Bus_Truk')
            ->get()
            ->toArray();
    
            $total = DB::table('grb_kalukubadoa')
            // ->where('company', 'MMN')
            ->whereYear('date', $year)
            ->whereMonth('date', $month)
            ->sum('total');
        } elseif ($time == 'prev') {
            $data = DB::table('grb_kalukubadoa')
            // ->where('company', 'MMN')
            ->whereYear('date', $year-1)
            ->whereMonth('date', $month)
            ->select(DB::raw('Mobil,Bus_Truk, sum(total) as total'))
            ->groupBy('')
            ->get()
            ->toArray();

            $total = DB::table('grb_kalukubadoa')
            // ->where('company', 'MMN')
            ->whereYear('date', $year-1)
            ->whereMonth('date', $month)
            ->sum('total');
        }

        for ($i = 0; $i < sizeof($data); $i++) {
            $data[$i]->percentage = round(($data[$i]->total / $total) * 100, 1);
        }

        if ($switch == 'percentage') {
            $percentage = array();
            foreach ($data as $d) {
                array_push($percentage, $d->percentage);
            }
            return $percentage;
        } elseif ($switch == 'Bus_Truk') {
            $Mobil = array();
            foreach ($data as $d) {
                array_push($Mobil, $d->Mobil);
            }
            return $Mobil;
        }
    }

    public function build($year, $month): \ArielMejiaDev\LarapexCharts\DonutChart
    {
        return $this->chart->donutChart()
            ->setFontFamily('poppins')
            ->setColors(['#25507D', '#5A5CE6', '#54D352', '#A8E96F', '#716FE9', '#FF9D05'])
            ->addData($this->getGraphData('percentage', 'curr', $year, $month))
            ->setLabels($this->getGraphData('Bus_Truk', 'curr', $year, $month));
    }
}
