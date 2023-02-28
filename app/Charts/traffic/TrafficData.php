<?php

namespace App\Charts\traffic;

use Illuminate\Support\Facades\DB;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class TrafficData
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }


    public function getGraphData($switch, $time = 'curr', $year, $month)
    
    {
        if ($time == 'curr') {
            $data = DB::table('info_traffics')
            ->where('company', 'MMN')
                ->whereYear('date', $year)
                ->whereMonth('date', $month)
                ->select(DB::raw('gate as gate, sum(traffic) as traffic'))
                ->groupBy('gate')
                ->get()
                ->toArray();

        } else if ($time == 'prev') {
            $data = DB::table('info_traffics')
            ->where('company', 'MMN')
                ->whereYear('date',$year-1)
                ->whereMonth('date', $month)
                ->select(DB::raw('gate as gate, sum(traffic) as traffic'))
                ->groupBy('gate')
                ->get()
                ->toArray();
        }

        if ($switch == 'traffic') {
            $traffic = array();
            foreach ($data as $d) {
                array_push($traffic, $d->traffic);
            }
            return $traffic;
        } elseif ($switch == 'gate') {
            $gate = array();
            foreach ($data as $d) {
                array_push($gate, $d->gate);
            }
            return $gate;
        }
    }

    public function build(): \ArielMejiaDev\LarapexCharts\BarChart
    {

        return $this->chart->BarChart()
            ->setFontFamily('poppins')
            ->setColors(['#FFC469', '#25507D',])
            ->setHeight(400)
            ->setGrid()
            ->addData("dataset 1",[230,330,184,100,239,299])
            ->addData("dataset 2",[220,192,104,140,239,400])
            ->setXAxis(['January', 'February', 'March', 'April', 'May', 'June'])
            ->setMarkers(['#FF5722', '#E040FB'], 7, 10);
    }
}
