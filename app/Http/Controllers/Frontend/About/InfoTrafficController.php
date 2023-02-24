<?php

namespace App\Http\Controllers\Frontend\About;

use Excel;
use App\Models\info_traffic;

use Illuminate\Http\Request;
use App\Imports\TundaBayarImport;
use App\Charts\Mmn\TrafficHistory;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use App\Charts\Mmn\KomposisiGerbang;
use App\Charts\Mmn\LaluLintasHarian;
use App\Charts\Mmn\KomposisiGolongan;
use App\Charts\Mmn\LaluLintasBulanan;
use App\Charts\Mmn\PerbandinganGerbang;
use App\Charts\Mmn\PerbandinganGolongan;
use App\Charts\Mmn\LaluLintasHarianGerbang;
use App\Charts\Jtse\TrafficHistory as JtseTrafficHistory;
use App\Charts\Jtse\KomposisiGerbang as JtseKomposisiGerbang;
use App\Charts\Jtse\LaluLintasHarian as JtseLaluLintasHarian;
use App\Charts\Jtse\KomposisiGolongan as JtseKomposisiGolongan;
use App\Charts\Jtse\LaluLintasBulanan as JtseLaluLintasBulanan;
use App\Charts\Jtse\PerbandinganGerbang as JtsePerbandinganGerbang;
use App\Charts\Jtse\PerbandinganGolongan as JtsePerbandinganGolongan;
use App\Charts\Jtse\LaluLintasHarianGerbang as JtseLaluLintasHarianGerbang;


class InfoTrafficController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $lastDate;
    protected $currentYear;
    protected $currentMonth;
    protected $currentMonthNumber;
    protected $currentMonthFullName;
    protected $prevYear;
    protected $prevMonth;
    protected $prevMonthNumber;
    protected $prevMonthFullName;
    protected $listMonth;


    public function __construct(info_traffic $info_traffic)
    {
        $this->lastDate = $info_traffic->queryLastDate();
        $this->currentYear = $info_traffic->getCurrentTime('year', $this->lastDate);
        $this->currentMonthNumber = $info_traffic->getCurrentTime('monthnumber', $this->lastDate);
        $this->currentMonthFullName = $info_traffic->getCurrentTime('monthfullname', $this->lastDate);
        $this->currentMonth = $info_traffic->getCurrentTime('month', $this->lastDate);

        $this->prevYear = $info_traffic->getPrevTime('year', $this->lastDate);
        $this->prevMonthNumber = $info_traffic->getPrevTime('monthnumber', $this->lastDate);
        $this->prevMonthFullName = $info_traffic->getPrevTime('monthfullname', $this->lastDate);
        $this->prevMonth = $info_traffic->getPrevTime('month', $this->lastDate);

        $this->listMonth = $info_traffic->listMonth($this->currentYear);
    }


    // LALU LINTAS HARIAN
    public function mmnHarian(LaluLintasHarian $chart)
    {
        $currentdate = date('Y-M-d', strtotime($this->currentYear . $this->currentMonthNumber . '01'));
        $lastmonth = date('Y-M-d', strtotime($this->currentYear . $this->currentMonthNumber . '01' . 'last month'));
        $lastyear = date('Y-M-d', strtotime($this->currentYear . $this->currentMonthNumber . '01' . 'last year'));
        // return $lastyear;
        return view('frontend.pages.about-us.infoTraffic', [
            // section 1
            'title' => 'Makassar Metro Network',
            'company' => 'MMN',
            'date' => $this->lastDate,
            'listMonth' => $this->listMonth,
            'currentYear' => $this->currentYear,
            'currentMonthNumber' => $this->currentMonthNumber,
            'currentMonthFullName' => $this->currentMonthFullName,
            'currentMonth' => $this->currentMonth,
            'prevYear' => $this->prevYear,
            'prevMonthNumber' => $this->prevMonthNumber,
            'prevMonthFullName' => $this->prevMonthFullName,
            'prevMonth' => $this->prevMonth,
            'chartTitle' => 'Laporan Lalu Lintas Harian',
            'chart' => $chart,
            'graph' => $chart->build($this->currentYear, $this->currentMonthNumber),
            'lastmonth' => $lastmonth,
            'lastyear' => $lastyear,
            'currentdate' => $currentdate
        ]);
    }
    public function mmnHarianBulan(LaluLintasHarian $chart, $bulan)
    {
        $currentdate = date('Y-M-d', strtotime($this->currentYear . '0' . $bulan . '01'));
        $lastmonth = date('Y-M-d', strtotime($this->currentYear .'0' . $bulan . '01' . 'last month'));
        $lastyear = date('Y-M-d', strtotime($this->currentYear .'0' . $bulan . '01' . 'last year'));
        // return $lastyear;
        return view('frontend.pages.about-us.infoTraffic', [
            // section 1
            'title' => 'Makassar Metro Network',
            'date' => $this->lastDate,
            'company' => 'MMN',
            'listMonth' => $this->listMonth,
            'currentYear' => $this->currentYear,
            'currentMonthNumber' => $bulan,
            'currentMonthFullName' => date('F', mktime(0, 0, 0, $bulan)),
            'currentMonth' => date('M', mktime(0, 0, 0, $bulan)),
            'prevYear' => $this->prevYear,
            'prevMonthNumber' => $bulan - 1,
            'prevMonthFullName' => date('F', mktime(0, 0, 0, $bulan - 1)),
            'prevMonth' => date('M', mktime(0, 0, 0, $bulan - 1)),
            'chartTitle' => 'Laporan Lalu Lintas Harian',
            'chart' => $chart,
            'graph' => $chart->build($this->currentYear, $bulan),
            'lastmonth' => $lastmonth,
            'lastyear' => $lastyear,
            'currentdate' => $currentdate
        ]);
    }

    public function jtseHarian(JtseLaluLintasHarian $chart)
    {
        $currentdate = date('Y-M-d', strtotime($this->currentYear . $this->currentMonthNumber . '01'));
        $lastmonth = date('Y-M-d', strtotime($this->currentYear . $this->currentMonthNumber . '01' . 'last month'));
        $lastyear = date('Y-M-d', strtotime($this->currentYear . $this->currentMonthNumber . '01' . 'last year'));
        return view('frontend.pages.about-us.infoTraffic', [
            // section 1
            'title' => 'Jalan Tol Seksi Empat',
            'company' => 'JTSE',
            'date' => $this->lastDate,
            'listMonth' => $this->listMonth,
            'currentYear' => $this->currentYear,
            'currentMonthNumber' => $this->currentMonthNumber,
            'currentMonthFullName' => $this->currentMonthFullName,
            'currentMonth' => $this->currentMonth,
            'prevYear' => $this->prevYear,
            'prevMonthNumber' => $this->prevMonthNumber,
            'prevMonthFullName' => $this->prevMonthFullName,
            'prevMonth' => $this->prevMonth,
            'chartTitle' => 'Laporan Lalu Lintas Harian',
            'chart' => $chart,
            'graph' => $chart->build($this->currentYear, $this->currentMonthNumber),
            'lastmonth' => $lastmonth,
            'lastyear' => $lastyear,
            'currentdate' => $currentdate
        ]);
    }

    public function jtseHarianBulan(JtseLaluLintasHarian $chart, $bulan)
    {
        $currentdate = date('Y-M-d', strtotime($this->currentYear . '0' . $bulan . '01'));
        $lastmonth = date('Y-M-d', strtotime($this->currentYear . '0' . $bulan . '01' . 'last month'));
        $lastyear = date('Y-M-d', strtotime($this->currentYear . '0' . $bulan . '01' . 'last year'));
        return view('frontend.pages.about-us.infoTraffic', [
            // section 1
            'title' => 'Jalan Tol Seksi Empat',
            'date' => $this->lastDate,
            'company' => 'JTSE',
            'listMonth' => $this->listMonth,
            'currentYear' => $this->currentYear,
            'currentMonthNumber' => $bulan,
            'currentMonthFullName' => date('F', mktime(0, 0, 0, $bulan)),
            'currentMonth' => date('M', mktime(0, 0, 0, $bulan)),
            'prevYear' => $this->prevYear,
            'prevMonthNumber' => $bulan - 1,
            'prevMonthFullName' => date('F', mktime(0, 0, 0, $bulan - 1)),
            'prevMonth' => date('M', mktime(0, 0, 0, $bulan - 1)),
            'chartTitle' => 'Laporan Lalu Lintas Harian',
            'chart' => $chart,
            'graph' => $chart->build($this->currentYear, $bulan),
            'lastmonth' => $lastmonth,
            'lastyear' => $lastyear,
            'currentdate' => $currentdate
        ]);
    }




    // LALU LINTAS GERBANG HARIAN
    public function mmnGerbang(LaluLintasHarianGerbang $chart2)
    {
        $currentdate = date('Y-M-d', strtotime($this->currentYear . $this->currentMonthNumber . '01'));
        $lastmonth = date('Y-M-d', strtotime($this->currentYear . $this->currentMonthNumber . '01' . 'last month'));
        $lastyear = date('Y-M-d', strtotime($this->currentYear . $this->currentMonthNumber . '01' . 'last year'));
        return view('frontend.pages.about-us.infoTraffic', [
            // section 2
            'title' => 'Makassar Metro Network',
            'date' => $this->lastDate,
            'gateList' => ['Cambaya', 'Parangloe', 'Kaluku-Bodoa', 'Tallo-Timur', 'Tallo-Barat'],
            'company' => 'MMN',
            'gate' => 'KALUKU BODOA',
            'currentYear' => $this->currentYear,
            'currentMonthNumber' => $this->currentMonthNumber,
            'currentMonthFullName' => $this->currentMonthFullName,
            'currentMonth' => $this->currentMonth,
            'prevYear' => $this->prevYear,
            'prevMonthNumber' => $this->prevMonthNumber,
            'prevMonthFullName' => $this->prevMonthFullName,
            'prevMonth' => $this->prevMonth,
            'graph2' => $chart2->build($this->currentYear, $this->currentMonthNumber, 'KALUKU BODOA'),
            'chartTitle2' => 'Laporan Lalu Lintas Harian Gerbang',
            'chart2' => $chart2,
            'lastmonth' => $lastmonth,
            'lastyear' => $lastyear,
            'currentdate' => $currentdate
        ]);
    }

    public function mmnGerbangDetail(LaluLintasHarianGerbang $chart2, $gate)
    {
        $currentdate = date('Y-M-d', strtotime($this->currentYear . $this->currentMonthNumber . '01'));
        $lastmonth = date('Y-M-d', strtotime($this->currentYear . $this->currentMonthNumber . '01' . 'last month'));
        $lastyear = date('Y-M-d', strtotime($this->currentYear . $this->currentMonthNumber . '01' . 'last year'));
        $g = str_replace('-', ' ', strtoupper($gate));
        return view('frontend.pages.about-us.infoTraffic', [
            // section 2
            'title' => 'Makassar Metro Network',
            'date' => $this->lastDate,
            'gateList' => ['Cambaya', 'Parangloe', 'Kaluku-Bodoa', 'Tallo-Timur', 'Tallo-Barat'],
            'company' => 'MMN',
            'gate' => $g,
            'currentYear' => $this->currentYear,
            'currentMonthNumber' => $this->currentMonthNumber,
            'currentMonthFullName' => $this->currentMonthFullName,
            'currentMonth' => $this->currentMonth,
            'prevYear' => $this->prevYear,
            'prevMonthNumber' => $this->prevMonthNumber,
            'prevMonthFullName' => $this->prevMonthFullName,
            'prevMonth' => $this->prevMonth,
            'graph2' => $chart2->build($this->currentYear, $this->currentMonthNumber, $g),
            'chartTitle2' => 'Laporan Lalu Lintas Harian Gerbang',
            'chart2' => $chart2,
            'lastmonth' => $lastmonth,
            'lastyear' => $lastyear,
            'currentdate' => $currentdate
        ]);
    }

    public function jtseGerbang(JtseLaluLintasHarianGerbang $chart2)
    {
        $currentdate = date('Y-M-d', strtotime($this->currentYear . $this->currentMonthNumber . '01'));
        $lastmonth = date('Y-M-d', strtotime($this->currentYear . $this->currentMonthNumber . '01' . 'last month'));
        $lastyear = date('Y-M-d', strtotime($this->currentYear . $this->currentMonthNumber . '01' . 'last year'));
        return view('frontend.pages.about-us.infoTraffic', [
            // section 2
            'title' => 'Jalan Tol Seksi Empat',
            'date' => $this->lastDate,
            'gateList' => ['Tamalanrea', 'Biringkanaya', 'Parangloe-Ramp', 'Bira-Barat', 'Bira-Timur'],
            'company' => 'JTSE',
            'gate' => 'TAMALANREA',
            'currentYear' => $this->currentYear,
            'currentMonthNumber' => $this->currentMonthNumber,
            'currentMonthFullName' => $this->currentMonthFullName,
            'currentMonth' => $this->currentMonth,
            'prevYear' => $this->prevYear,
            'prevMonthNumber' => $this->prevMonthNumber,
            'prevMonthFullName' => $this->prevMonthFullName,
            'prevMonth' => $this->prevMonth,
            'graph2' => $chart2->build($this->currentYear, $this->currentMonthNumber, 'TAMALANREA'),
            'chartTitle2' => 'Laporan Lalu Lintas Harian Gerbang',
            'chart2' => $chart2,
            'lastmonth' => $lastmonth,
            'lastyear' => $lastyear,
            'currentdate' => $currentdate
        ]);
    }

    public function jtseGerbangDetail(JtseLaluLintasHarianGerbang $chart2, $gate)
    {
        $currentdate = date('Y-M-d', strtotime($this->currentYear . $this->currentMonthNumber . '01'));
        $lastmonth = date('Y-M-d', strtotime($this->currentYear . $this->currentMonthNumber . '01' . 'last month'));
        $lastyear = date('Y-M-d', strtotime($this->currentYear . $this->currentMonthNumber . '01' . 'last year'));
        $g = str_replace('-', ' ', strtoupper($gate));
        return view('frontend.pages.about-us.infoTraffic', [
            // section 2
            'title' => 'Jalan Tol Seksi Empat',
            'date' => $this->lastDate,
            'gateList' => ['Tamalanrea', 'Biringkanaya', 'Parangloe-Ramp', 'Bira-Barat', 'Bira-Timur'],
            'company' => 'JTSE',
            'gate' => $g,
            'currentYear' => $this->currentYear,
            'currentMonthNumber' => $this->currentMonthNumber,
            'currentMonthFullName' => $this->currentMonthFullName,
            'currentMonth' => $this->currentMonth,
            'prevYear' => $this->prevYear,
            'prevMonthNumber' => $this->prevMonthNumber,
            'prevMonthFullName' => $this->prevMonthFullName,
            'prevMonth' => $this->prevMonth,
            'graph2' => $chart2->build($this->currentYear, $this->currentMonthNumber, $g),
            'chartTitle2' => 'Laporan Lalu Lintas Harian Gerbang',
            'chart2' => $chart2,
            'lastmonth' => $lastmonth,
            'lastyear' => $lastyear,
            'currentdate' => $currentdate
        ]);
    }



    // LALU LINTAS BULANAN
    public function mmnBulanan(LaluLintasBulanan $chart)
    {
        return view('frontend.pages.about-us.infoTraffic', [
            // section 3
            'title' => 'Makassar Metro Network',
            'currentYear' => $this->currentYear,
            'currentMonthNumber' => $this->currentMonthNumber,
            'currentMonthFullName' => $this->currentMonthFullName,
            'currentMonth' => $this->currentMonth,
            'prevYear' => $this->prevYear,
            'prevMonthNumber' => $this->prevMonthNumber,
            'prevMonthFullName' => $this->prevMonthFullName,
            'prevMonth' => $this->prevMonth,
            'graph3' => $chart->build($this->currentYear),
            'chartTitle3' => 'Laporan Lalu Lintas Bulanan',
            'chart3' => $chart,
        ]);
    }
    public function jtseBulanan(JtseLaluLintasBulanan $chart)
    {
        return view('frontend.pages.about-us.infoTraffic', [
            // section 3
            'title' => 'Jalan Tol Seksi Empat',
            'currentYear' => $this->currentYear,
            'currentMonthNumber' => $this->currentMonthNumber,
            'currentMonthFullName' => $this->currentMonthFullName,
            'currentMonth' => $this->currentMonth,
            'prevYear' => $this->prevYear,
            'prevMonthNumber' => $this->prevMonthNumber,
            'prevMonthFullName' => $this->prevMonthFullName,
            'prevMonth' => $this->prevMonth,
            'graph3' => $chart->build($this->currentYear),
            'chartTitle3' => 'Laporan Lalu Lintas Bulanan',
            'chart3' => $chart,
        ]);
    }



    // KOMPOSISI GERBANG DAN GOLONGAN
    public function mmnKomposisi(KomposisiGerbang $chart1, KomposisiGolongan $chart2, PerbandinganGerbang $chart3, PerbandinganGolongan $chart4)
    {
        return view('frontend.pages.about-us.infoTraffic', [
            // section 3
            'title' => 'Makassar Metro Network',
            'currentYear' => $this->currentYear,
            'currentMonthNumber' => $this->currentMonthNumber,
            'currentMonthFullName' => $this->currentMonthFullName,
            'currentMonth' => $this->currentMonth,
            'prevYear' => $this->prevYear,
            'prevMonthNumber' => $this->prevMonthNumber,
            'prevMonthFullName' => $this->prevMonthFullName,
            'prevMonth' => $this->prevMonth,
            'graph4' => $chart1->build($this->currentYear, $this->currentMonthNumber),
            'chartTitle4' => 'Komposisi Gerbang',
            'chart4' => $chart1,
            'graph5' => $chart2->build($this->currentYear, $this->currentMonthNumber),
            'chartTitle5' => 'Komposisi Golongan',
            'chart5' => $chart2,
            'chart7' => $chart3->build($this->currentYear, $this->currentMonthNumber),
            'chartTitle7' => 'Perbandingan Gerbang',
            'chart8' => $chart4->build($this->currentYear, $this->currentMonthNumber),
            'chartTitle8' => 'Perbandingan Gerbang',
        ]);
    }
    public function jtseKomposisi(JtseKomposisiGerbang $chart1, JtseKomposisiGolongan $chart2, JtsePerbandinganGerbang $chart3, JtsePerbandinganGolongan $chart4)
    {
        return view('frontend.pages.about-us.infoTraffic', [
            // section 3
            'title' => 'Jalan Tol Seksi Empat',
            'currentYear' => $this->currentYear,
            'currentMonthNumber' => $this->currentMonthNumber,
            'currentMonthFullName' => $this->currentMonthFullName,
            'currentMonth' => $this->currentMonth,
            'prevYear' => $this->prevYear,
            'prevMonthNumber' => $this->prevMonthNumber,
            'prevMonthFullName' => $this->prevMonthFullName,
            'prevMonth' => $this->prevMonth,
            'graph4' => $chart1->build($this->currentYear, $this->currentMonthNumber),
            'chartTitle4' => 'Komposisi Gerbang',
            'chart4' => $chart1,
            'graph5' => $chart2->build($this->currentYear, $this->currentMonthNumber),
            'chartTitle5' => 'Komposisi Golongan',
            'chart5' => $chart2,
            'chart7' => $chart3->build($this->currentYear, $this->currentMonthNumber),
            'chartTitle7' => 'Perbandingan Gerbang',
            'chart8' => $chart4->build($this->currentYear, $this->currentMonthNumber),
            'chartTitle8' => 'Perbandingan Gerbang',
        ]);
    }



    // TRAFFIC HISTORY
    public function mmnTrafficHistory(TrafficHistory $chart6)
    {
        return view('frontend.pages.about-us.infoTraffic', [
            // section5
            'title' => 'Makassar Metro Network',
            'currentYear' => $this->currentYear,
            'currentMonthNumber' => $this->currentMonthNumber,
            'currentMonthFullName' => $this->currentMonthFullName,
            'currentMonth' => $this->currentMonth,
            'prevYear' => $this->prevYear,
            'prevMonthNumber' => $this->prevMonthNumber,
            'prevMonthFullName' => $this->prevMonthFullName,
            'prevMonth' => $this->prevMonth,
            'chart6' => $chart6->build(),
            'chartTitle6' => 'Traffic History',
            // 'staticDescription' => $chart6->staticDescription(),
            'data' => $chart6->getIndex(),
        ]);
    }
    public function jtseTrafficHistory(JtseTrafficHistory $chart6)
    {
        return view('frontend.pages.about-us.infoTraffic', [
            // section5
            'title' => 'Jalan Tol Seksi Empat',
            'currentYear' => $this->currentYear,
            'currentMonthNumber' => $this->currentMonthNumber,
            'currentMonthFullName' => $this->currentMonthFullName,
            'currentMonth' => $this->currentMonth,
            'prevYear' => $this->prevYear,
            'prevMonthNumber' => $this->prevMonthNumber,
            'prevMonthFullName' => $this->prevMonthFullName,
            'prevMonth' => $this->prevMonth,
            'chart6' => $chart6->build(),
            'chartTitle6' => 'Traffic History',
            // 'staticDescription' => $chart6->staticDescription(),
            'data' => $chart6->getIndex(),
        ]);
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
            $mean = $d / 365;
            $mean = round($mean);
            array_push($traffic, $mean);
            array_push($year, $y);
        }

        if ($switch == 'year') {
            return $year;
        }elseif ($switch == 'traffic') {
            return $traffic;
        }
    }

    public function map()
    {
        return view('frontend.pages.about-us.maps');
    }

    public function cctv()
    {
        return view('frontend.pages.about-us.cctv');
    }
    // TESTING
    public function test()
    {
        return view('frontend.pages.about-us.test', [
            'title' => 'Info Traffic',
            'test' => $this->trafficHistory('traffic'),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function import(Request $request)
    {
        Excel::import(new TundaBayarImport, $request->file);
        return redirect('/admin/delayedpayments');
    }
}
