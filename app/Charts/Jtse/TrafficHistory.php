<?php

namespace App\Charts\Jtse;

use Illuminate\Support\Facades\DB;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class TrafficHistory
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function getIndex()
    {
        $data = DB::table('postsjtse')
        ->get()
            ->toArray();

        return $data;
    }

    public function trafficHistory($switch)
    {
        $data = DB::table('info_traffics')
        ->select(DB::raw('company, YEAR(`date`) as year, SUM(`traffic`) as traffic'))
        ->where('company', 'JTSE')
            ->groupBy('company', 'year')
            ->get()
            ->toArray();
        $traffic = array();
        $year = array();
        foreach ($data as $key => $value) {
            $d = $data[$key]->traffic;
            $y = $data[$key]->year;
            $mean = $d / 365;
            $mean = round($mean);
            array_push($traffic, $mean);
            array_push($year, $y);
        }

        if ($switch == 'year') {
            return $year;
        } elseif ($switch == 'traffic') {
            return $traffic;
        }
    }

    // public function staticDescription()
    // {
    //     return [
    //         '01' => [
    //             'year' => '2008',
    //             'description' => 'Commenced Operation on September 26, 2008',
    //         ],
    //         '02' => [
    //             'year' => '2009',
    //             'description' => 'The factor of imposing toll tariffs makes Makassar residents prefer to use arterial roads, so that the traffic through toll section IV is still relatively small'
    //         ],
    //         '03' => [
    //             'year' => '2010-2013',
    //             'description' => 'Overlay in 2010 to support increased traffic High levels of traffic jams in the Perintis Kemerdekaan so that drivers switch to toll roads',
    //         ],
    //         '04' => [
    //             'year' => '2014-2015',
    //             'description' => 'The level of frontage damage is high so the drivers switch to using toll roads'
    //         ],
    //         '05' => [
    //             'year' => '2016',
    //             'description' => 'Traffic is declining due to the implementation of the mandai intersection work and frontage reconstruction is complete',
    //         ],
    //         '06' => [
    //             'year' => '2017',
    //             'description' => 'Construction of the Mandai Intersection was completed at the end of June 2017',
    //         ],
    //         '07' => [
    //             'year' => '2018',
    //             'description' => ' the construction of the Pettarani elevated toll road, have an impact on the decline in traffic that began in the August 2018 period and a significant influence  occur in the December 2018 period',
    //         ],
    //         '08' => [
    //             'year' => '2019',
    //             'description' => 'The Pettarani Elevated Toll Road Project has an impact on the decrease in Traffic compared to the previous period',
    //         ],
    //         '09' => [
    //             'year' => '2020',
    //             'description' => 'Covid 19 cause decreased traffic , and Pettarani Elevated Toll Road Project still has an influence.',
    //         ],
    //         '10' => [
    //             'year' => '2021',
    //             'description' => 'Covid 19 still continue impact to decrease traffic',
    //         ],
    //     ];
    // }

    public function build(): \ArielMejiaDev\LarapexCharts\BarChart
    {
        $staticTraffic = [11250, 16592, 21411, 26034, 30795, 35574, 40316, 42423, 37656, 39614, 41954, 39845, 26396, 30329];
        $staticYear = ['2008', '2009', '2010', '2011', '2012', '2013', '2014', '2015', '2016', '2017', '2018', '2019', '2020', '2021'];
        return $this->chart->barChart()
            ->setFontFamily('poppins')
            ->setColors(['#25507D'])
            ->setGrid()
            ->addData('Traffic History', array_merge($staticTraffic, $this->trafficHistory('traffic')))
            ->setXAxis(array_merge($staticYear, $this->trafficHistory('year')));
    }
}
