<?php

namespace App\Charts\Jtse;

use Illuminate\Support\Facades\DB;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class KomposisiGolongan
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
                ->where('company', 'JTSE')
                ->whereYear('date', $year)
                ->whereMonth('date', $month)
                ->select(DB::raw('class as class, sum(traffic) as traffic'))
                ->groupBy('class')
                ->get()
                ->toArray();

            $total = DB::table('info_traffics')
                ->where('company', 'JTSE')
                ->whereYear('date', $year)
                ->whereMonth('date', $month)
                ->sum('traffic');
        } elseif ($time == 'prev') {
            $data = DB::table('info_traffics')
                ->where('company', 'JTSE')
                ->whereYear('date', $year-1)
                ->whereMonth('date', $month)
                ->select(DB::raw('class as class, sum(traffic) as traffic'))
                ->groupBy('class')
                ->get()
                ->toArray();

            $total = DB::table('info_traffics')
                ->where('company', 'JTSE')
                ->whereYear('date', $year-1)
                ->whereMonth('date', $month)
                ->sum('traffic');
        }

        for ($i = 0; $i < sizeof($data); $i++) {
            $data[$i]->percentage = round(($data[$i]->traffic / $total) * 100, 1);
        }

        if ($switch == 'percentage') {
            $percentage = array();
            foreach ($data as $d) {
                array_push($percentage, $d->percentage);
            }
            return $percentage;
        } elseif ($switch == 'class') {
            $class = array();
            foreach ($data as $d) {
                array_push($class, 'Gol. ' . $d->class);
            }
            return $class;
        }
    }

    public function build($year, $month): \ArielMejiaDev\LarapexCharts\DonutChart
    {
        return $this->chart->donutChart()
            ->setFontFamily('poppins')
            ->setColors(['#25507D', '#5A5CE6', '#54D352', '#A8E96F', '#FF9D05'])
            ->setHeight(320)
            ->addData($this->getGraphData('percentage', 'curr', $year, $month))
            ->setLabels($this->getGraphData('class', 'curr', $year, $month));
    }
}
