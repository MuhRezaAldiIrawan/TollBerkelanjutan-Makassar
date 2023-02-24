<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Billboard;

class BillboardController extends Controller
{

    public function index(){

        $billboard = Billboard::orderBy('id', 'desc')->get();

        $customBillboard = [];

        foreach($billboard as $billboard){
            $location = explode(",",$billboard->location);
            $long = $location[1];
            $lat = $location[0];
            $customBillboard[] = [
                'type' => 'Feature',
                'geometry' => [
                    'coordinates' => [$long, $lat],
                    'type' => 'Point',
                ],
                'properties' => [
                    'locationId' => $billboard->id,
                    'title' => $billboard->name,
                    'image' => $billboard->image,
                    'description' => $billboard->description,
                    'specification' => $billboard->specification
                ]
            ];
        }

        $geoLocation = [
            'type' => 'FeatureCollection',
            'features' => $customBillboard
        ];

        $geoJson = collect($geoLocation)->toJson();

        return view('frontend/pages/billboard')->with('geoJson', $geoJson);

    }

}
