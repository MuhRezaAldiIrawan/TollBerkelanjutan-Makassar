<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class info_traffic extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];

    public static function queryLastDate()
    {
        return DB::table('info_traffics')
        ->select(DB::raw('date(date) as date'))
        ->groupBy('date')
        ->get('date')
        ->last();
    }

    public static function listMonth($year)
    {
        return DB::table('info_traffics')
            ->select(DB::raw('MONTH(`date`) as bulan, MONTHNAME(`date`) as nama_bulan'))
            ->whereYear('date', $year)
            ->groupBy('bulan', 'nama_bulan')
            ->orderBy('bulan')
            ->get()
            ->toArray();
    }

    public static function getCurrentTime($scope, $date)
    {
        $queryDate = $date;
        if ($scope == 'year') {
            return date('Y', strtotime($queryDate->date));
        } elseif ($scope == 'month') {
            return date('M', strtotime($queryDate->date));
        } elseif ($scope == 'monthfullname') {
            return date('F', strtotime($queryDate->date));
        } elseif ($scope == 'monthnumber') {
            return date('m', strtotime($queryDate->date));
        }

        // return $queryDate->date;
    }

    public static function getPrevTime($scope, $date)
    {
        $queryDate = $date;
        if ($scope == 'year') {
            return date('Y', strtotime($queryDate->date . ' -1 year'));
        } elseif ($scope == 'month') {
            return date('M', strtotime($queryDate->date . 'first day of last month'));
        } elseif ($scope == 'monthfullname') {
            return date('F', strtotime($queryDate->date . 'first day of last month'));
        } elseif ($scope == 'monthnumber') {
            return date('m', strtotime($queryDate->date . 'first day of last month'));
        }
    }

    public static function gateLastDate($year, $month, $company = 'MMN', $gate = 'KALUKU BODOA')
    {
        return DB::table('info_traffics')
            ->where('company', $company)
            ->whereYear('date', $year)
            ->whereMonth('date', $month)
            ->where('gate', $gate)
            ->select(DB::raw('date(date) as day'))
            ->groupBy('date')
            ->get()
            ->last();
    }

    public static function lastDate($year, $month, $company = 'MMN')
    {
        return DB::table('info_traffics')
        ->where('company', $company)
            ->whereYear('date', $year)
            ->whereMonth('date', $month)
            ->select(DB::raw('date(date) as day'))
            ->groupBy('date')
            ->get()
            ->last();
    }

    // public function loadData()
    // {
    //     $date = $this->lastDate($year, $month, $company, $gate);
    //     $countDay = date('d', strtotime($date->day));
    //     $a = array();
    //     for ($day = 1; $day <= ($countDay); $day++) {
    //         $graph = DB::table('info_traffics')
    //         ->where('company', $company)
    //             ->where('gate', $gate)
    //             ->whereDate('date', date('Y-m-d', strtotime($this->getCurrentTime('year') . '-' . $this->getCurrentTime('monthnumber') . '-' . $day)))
    //             ->sum('traffic');
    //         array_push($a, $graph);
    //     }
    //     return $a;
    // }

    // protected function getGraphData($switch = 'curr', $year, $month, $gate = 'KALUKU BODOA', $company = 'MMN')
    // {

    //     if ($switch == 'curr') {
    //         $date = $this->lastDate($year, $month, $company, $gate);
    //         $countDay = date('d', strtotime($date->day));
    //         $a = array();
    //         for ($day = 1; $day <= ($countDay); $day++) {
    //             $graph = DB::table('info_traffics')
    //             ->where('company', $company)
    //                 ->where('gate', $gate)
    //                 ->whereDate('date', date('Y-m-d', strtotime($this->getCurrentTime('year') . '-' . $this->getCurrentTime('monthnumber') . '-' . $day)))
    //                 ->sum('traffic');
    //             array_push($a, $graph);
    //         }
    //         return array_map('intval', $a);
    //     } elseif ($switch == 'prev') {
    //         $date = $this->lastDate($year, $month, $company, $gate);
    //         $countDay = date('d', strtotime($date->day));
    //         $a = array();
    //         for ($day = 1; $day <= ($countDay); $day++) {
    //             $graph = DB::table('info_traffics')
    //             ->where('company', $company)
    //                 ->where('gate', $gate)
    //                 ->whereDate('date', date('Y-m-d', strtotime($this->getCurrentTime('year') . '-' . $this->getCurrentTime('monthnumber') . '-' . $day . ' -364 days')))
    //                 ->sum('traffic');
    //             array_push($a, $graph);
    //         }
    //         return array_map('intval', $a);
    //     }
    // }

    // // perhitungan data lhr traffic
    // public function getLhrData($year, $month, $gate = 'KALUKU BODOA', $company = 'MMN')
    // {
    //     $date = DB::table('info_traffics')
    //     ->where('company', $company)
    //         ->whereYear('date', $year)
    //         ->whereMonth('date', $month)
    //         ->where('gate', $gate)
    //         ->select(DB::raw('date(date) as day'))
    //         ->groupBy('date')
    //         ->get()
    //         ->last();
    //     $countDay = date('d', strtotime($date->day));

    //     $traffic = DB::table('info_traffics')
    //     ->whereYear('date', $year)
    //         ->whereMonth('date', $month)
    //         ->where('company', $company)
    //         ->where('gate', $gate)
    //         ->sum('traffic');
    //     $mean = $traffic / ($countDay);

    //     return number_format(round($mean), 0, '.', '.');
    // }

    // public function getGrowth($switch, $year, $month, $company = 'MMN', $gate = 'KALUKU BODOA')
    // {
    //     $currLhr = $this->getLhrData($year, $month, $gate, $company);

    //     if ($switch == 'year') {
    //         $prevLhr = $this->getLhrData($year - 1, $month, $gate, $company);
    //     } elseif ($switch == 'month') {
    //         $prevLhr = $this->getLhrData($year, $month - 1, $gate, $company);
    //     }

    //     $growth = ($currLhr - $prevLhr) / $prevLhr * 100;



    //     return number_format($growth, 1, '.', '.');
    // }
}
