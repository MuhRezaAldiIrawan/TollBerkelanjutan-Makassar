<?php

namespace App\Charts\Jtse;

use Illuminate\Support\Facades\DB;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class LaluLintasHarian
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    // GETTER

    // tambahkan properti untuk memberi nilai default tahun, bulan dan perusahaan

    // query dan perhitungan data traffic untuk disajikan ke grafik
    protected function getGraphData($switch = 'curr', $year, $month, $company = 'JTSE')
    {

        if ($switch == 'curr') {
            $graph = DB::table('info_traffics')
                ->select(DB::raw('company, `date`, SUM(traffic) as traffic'))
                ->where('company', $company)
                ->whereYear('date', $year)
                ->whereMonth('date', $month)
                ->groupBy('date', 'company')
                ->get()
                ->toArray();
            $a = array();
            foreach ($graph as $key => $value) {
                $data = $graph[$key]->traffic;
                array_push($a, $data);
            }

            return array_map('intval', $a);
        } elseif ($switch == 'prev') {
            $date = DB::table('info_traffics')
                ->where('company', $company)
                ->whereYear('date', $year - 1)
                ->whereMonth('date', $month)
                ->select(DB::raw('date(date) as day'))
                ->groupBy('date')
                ->get()
                ->last();
            $countDay = date('d', strtotime($date->day));
            $a = array();
            for ($day = 1; $day <= ($countDay); $day++) {
                $graph = DB::table('info_traffics')
                    ->where('company', $company)
                    ->whereDate('date', date('Y-m-d', strtotime($year . '-' . $month . '-' . $day . ' -364 days')))
                    ->sum('traffic');
                array_push($a, $graph);
            }
            return array_map('intval', $a);
        }
    }

    // perhitungan data lhr traffic
    public function getLhrData($year, $month, $company = 'JTSE')
    {
        $graph = DB::table('info_traffics')
            ->select(DB::raw('company, `date`, SUM(traffic) as traffic'))
            ->where('company', $company)
            ->whereYear('date', $month <= 0 ? $year - 1 : $year)
            ->whereMonth('date', $month <= 0 ? 12 : $month)
            ->groupBy('date', 'company')
            ->get()
            ->toArray();
        $a = array();
        foreach ($graph as $key => $value) {
            $data = $graph[$key]->traffic;
            array_push($a, $data);
        }

        $mean = array_sum($a) / (count($a));

        return number_format(round($mean), 0, '.', '.');
    }

    public function getGrowth($switch, $year, $month, $company = 'JTSE')
    {
        $currLhr = $this->getLhrData($year, $month, $company);

        if ($switch == 'year') {
            $prevLhr = $this->getLhrData($year - 1, $month, $company);
        } elseif ($switch == 'month') {
            if ($month <= 1) {
                $prevLhr = $this->getLhrData($year - 1, 12, $company);
            } else {
                $prevLhr = $this->getLhrData($year, $month - 1, $company);
            }
        }

        $growth = ($currLhr - $prevLhr) / $prevLhr * 100;



        return number_format($growth, 1, '.', '.');
    }

    // SETTER
    public function build($year, $month): \ArielMejiaDev\LarapexCharts\LineChart
    {
        return $this->chart->lineChart()
            ->addData($year - 1, $this->getGraphData('prev', $year, $month, 'JTSE'))
            ->addData($year, $this->getGraphData('curr', $year, $month, 'JTSE'))
            ->setGrid()
            ->setFontFamily('poppins')
            ->setColors(['#FFC469', '#25507D'])
            ->setXAxis(['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23', '24', '25', '26', '27', '28', '29', '30', '31']);
    }
}
