<?php

namespace App\Http\Controllers\DataTraffic;

use App\Http\Controllers\Controller;
use App\Models\info_traffic;
use Illuminate\Http\Request;

class DataTrafficApiController extends Controller
{
    public function index()
    {
        return info_traffic::all();
    }

    public function store(Request $request)
    {
        $trafficsData = $request->all();

        foreach ($trafficsData['traffics'] as $value) {
            info_traffic::updateOrCreate(
                [
                    'date' => $value['date'],
                    'company' => $value['company'],
                    'gate' => $value['gate'],
                    'class' => $value['class'],
                    'source' => $value['source'],
                ],
                [
                    'traffic' => $value['traffic'],
                ]
            );
        }

        
        return response()->json(['success' => 'Data Traffic Berhasil Ditambahkan']);
    }
}
