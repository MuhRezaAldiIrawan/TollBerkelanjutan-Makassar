<?php

namespace App\Chart\Pelanggaran;

use Illuminate\Support\Facades\DB;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class gerbang
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
            ->whereYear('waktu_input', $year)
            ->whereMonth('waktu_input', $month)
            ->select(DB::raw('Mobil as Mobil, Bus_Truk as Bus_Truk'))
            ->groupBy('total')
            ->get()
            ->toArray();
    
            $total = DB::table('grb_kalukubadoa')
            // ->where('company', 'MMN')
            ->whereYear('waktu_input', $year)
            ->whereMonth('waktu_input', $month)
            ->sum('total');
        } elseif ($time == 'prev') {
            $data = DB::table('grb_kalukubadoa')
            // ->where('company', 'MMN')
            ->whereYear('waktu_input', $year-1)
            ->whereMonth('waktu_input', $month)
            ->select(DB::raw('Mobil as Mobil, Bus_Truk as Bus_Truk'))
            ->groupBy('total')
            ->get()
            ->toArray();

            $total = DB::table('grb_kalukubadoa')
            // ->where('company', 'MMN')
            ->whereYear('waktu_input', $year-1)
            ->whereMonth('waktu_input', $month)
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
            $gate = array();
            foreach ($data as $d) {
                array_push($gate, $d->gate);
            }
            return $gate;
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
