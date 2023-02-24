<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location;

class MapsController extends Controller
{
    //
    public function index(){

    	$location = Location::orderBy('id', 'desc')->get();

    	$customLocations = [];

		foreach($location as $location){
			$customLocations[] = [
				'type' => 'Feature',
				'geometry' => [
					'coordinates' => [$location->long, $location->lat],
					'type' => 'Point',
				],
				'properties' => [
					'locationId' => $location->id,
					'title' => $location->title
				]
			];
		}

		$geoLocation = [
			'type' => 'FeatureCollection',
			'features' => $customLocations
		];

		$geoJson = collect($geoLocation)->toJson();

    	return view('frontend/pages/maps')->with('geoJson', $geoJson);

    }
}
