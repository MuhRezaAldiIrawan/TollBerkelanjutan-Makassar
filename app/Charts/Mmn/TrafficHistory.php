<?php

namespace App\Charts\Mmn;

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
        $data = DB::table('postsmmn')
            ->get()
            ->toArray();

        return $data;
    }

    public function trafficHistory($switch)
    {
        $data = DB::table('info_traffics')
        ->select(DB::raw('company, YEAR(`date`) as year, SUM(`traffic`) as traffic'))
        ->where('company', 'MMN')
            ->groupBy('company', 'year')
            ->get()
            ->toArray();
        
        $traffic = array();
        $year = array();
        foreach ($data as $key => $value) {
            $d = $data[$key]->traffic;
            $y = $data[$key]->year;
            $count_day = DB::table('info_traffics')
            ->select(DB::raw('`date`, SUM(traffic) as traffic'))
            ->whereYear('date', $y)
            ->groupBy('date',)
            ->get()
            ->count();
            $mean = $d / $count_day;
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
    //             'year' => '1998',
    //             'description' => 'Commenced Operation on April 29, 1998',
    //         ],
    //         '02' => [
    //             'year' => '2004-2005',
    //             'description' => 'V / C ratio of Ir. Sutami is saturated with the existing width: 7m which is used in 2 directions',
    //         ],
    //         '03' => [
    //             'year' => '2009-2013',
    //             'description' => 'Traffic generation caused by the operation of Toll Road section IV (JTSE)',
    //         ],
    //         '04' => [
    //             'year' => '2014-2015',
    //             'description' => 'JTSE frontage damage affects BMN traffic because residents prefer to use Perintis kemerdekaan roads',
    //         ],
    //         '05' => [
    //             'year' => '2016',
    //             'description' => 'Traffic grew relatively small due to the disruption of the construction of the Simpang Lima Mandai Work',
    //         ],
    //         '06' => [
    //             'year' => '2017',
    //             'description' => 'Traffic increased due to the construction of the Lima Mandai intersection completed at the end of June 2017',
    //         ],
    //         '07' => [
    //             'year' => '2018',
    //             'description' => 'With the construction of the Pettarani elevated toll road, have an impact on the decline in traffic that began in the August 2018 period and a significant influence occurred in the December 2018 period',
    //         ],
    //         '08' => [
    //             'year' => '2019',
    //             'description' => 'The Pettarani Elevated Toll Road Project has an impact on the decrease in Traffic compared to the previous period',
    //         ],
    //         '09' => [
    //             'year' => '2020',
    //             'description' => 'Covid 19 cause decreased traffic, and Pettarani Elevated Toll Road Project still has an influence',
    //         ],
    //         '10' => [
    //             'year' => '2021',
    //             'description' => 'Covid 19 still continue impact to decrease traffic',
    //         ],
    //     ];
    // }

    public function build(): \ArielMejiaDev\LarapexCharts\BarChart
    {
        $staticTraffic = [14588, 18147, 21138, 22508, 24474, 26562, 27919, 28096, 26401, 26201, 25096, 34789, 38980, 43972, 48412, 54035, 55604, 57232, 58501, 62732, 62479, 56382, 39665];
        $staticYear = ['1998', '1999', '2000', '2001', '2002', '2003', '2004', '2005', '2006', '2007', '2008', '2009', '2010', '2011', '2012', '2013', '2014', '2015', '2016', '2017', '2018', '2019', '2020'];
        return $this->chart->barChart()
            ->setFontFamily('poppins')
            ->setColors(['#25507D'])
            ->setGrid()
            ->addData('Traffic History', array_merge($staticTraffic, $this->trafficHistory('traffic')))
            ->setXAxis(array_merge($staticYear, $this->trafficHistory('year')));
    }
}
