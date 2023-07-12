<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use  App\Facades\Proj4phpFacade;
use proj4php\Proj4php;
use proj4php\Proj;
use proj4php\Point;
// use Proj4phpFacade;

// use Proj4php\Proj;
// use Proj4php\Point;

class RumusController extends Controller
{
    //

    public function index()
    {
        $X = [604805.705, 604805.667, 604836.801, 604836.840, 604805.705];
        $Y = [9198524.891, 9198506.537, 9198506.472, 9198524.826, 9198524.891];

        $xCoordinates = $X;
        $yCoordinates = $Y;

        $xCoordinates[] = $xCoordinates[0];
        $yCoordinates[] = $yCoordinates[0];

        $sum = 0;
        $diff = 0;
        $count = count($X);

        for ($i = 0; $i < $count; $i++) {
            $sum += ($xCoordinates[$i] * $yCoordinates[$i + 1]);
            $diff -= ($xCoordinates[$i + 1] * $yCoordinates[$i]);
        }

        $area = abs(($sum + $diff) / 2);


        dd($area);


    }

    public function utm()
    {
        $lon = 111.949360; // Example longitude
        $lat = -7.249818;   // Example latitude
        $proj4php = new Proj4php();

        $sourceProj = new Proj('EPSG:4326', $proj4php);  // Source coordinate system (e.g., WGS84)
        $targetProj = new Proj('EPSG:32749', $proj4php); // Target coordinate system (UTM zone 49s)

        $point = new Point($lon, $lat);
        $transformedPoint = $proj4php->transform($sourceProj, $targetProj, $point);


        $utmEasting = $transformedPoint->x; // UTM easting coordinate
        $utmNorthing = $transformedPoint->y; // UTM northing coordinate
        dd($utmEasting, $utmNorthing);
    }
}
