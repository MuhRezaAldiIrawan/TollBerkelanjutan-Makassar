<?php

namespace App\Charts\Mmn;

use Illuminate\Support\Facades\DB;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class PerbandinganGolongan
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
            ->select(DB::raw('class as class, sum(traffic) as traffic'))
            ->groupBy('class')
            ->get()
                ->toArray();
        } elseif ($time == 'prev') {
            $data = DB::table('info_traffics')
                ->where('company', 'MMN')
                ->whereYear('date', $year-1)
                ->whereMonth('date', $month)
                ->select(DB::raw('class as class, sum(traffic) as traffic'))
                ->groupBy('class')
                ->get()
                ->toArray();
        }

        if ($switch == 'traffic') {
            $traffic = array();
            foreach ($data as $d) {
                array_push($traffic, $d->traffic);
            }
            return $traffic;
        } elseif ($switch == 'class') {
            $class = array();
            foreach ($data as $d) {
                array_push($class, $d->class);
            }
            return $class;
        }
    }

    public function build($year, $month): \ArielMejiaDev\LarapexCharts\HorizontalBar
    {
        return $this->chart->horizontalBarChart()
            ->setFontFamily('poppins')
            ->setColors(['#FFC469', '#25507D'])
            ->setHeight(300)
            ->setGrid()
            ->addData($year-1, $this->getGraphData('traffic', 'prev', $year, $month))
            ->addData($year, $this->getGraphData('traffic', 'curr', $year, $month))
            ->setXAxis($this->getGraphData('class', 'curr', $year, $month));
    }
}
