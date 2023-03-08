<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class violation extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];

    public static function queryLastDate()
    {
        $date = DB::table('table_counting')
        ->select(DB::raw('date(date) as date'))
        ->groupBy('date')
        ->get('date')
        ->last();
        return $date;
    }

    public static function listMonth($year)
    {
        return DB::table('table_counting')
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

    public static function gateLastDate($year, $month, )
    {
        return DB::table('table_counting')
            // ->where('company', $company)
            ->whereYear('date', $year)
            ->whereMonth('date', $month)
            // ->where('gate', $gate)
            ->select(DB::raw('date(date) as day'))
            ->groupBy('date')
            ->get()
            ->last();
    }

    public static function lastDate($year, $month, $company = 'MMN')
    {
        return DB::table('table_counting')
        // ->where('company', $company)
            ->whereYear('date', $year)
            ->whereMonth('date', $month)
            ->select(DB::raw('date(date) as day'))
            ->groupBy('date')
            ->get()
            ->last();
    }
}
