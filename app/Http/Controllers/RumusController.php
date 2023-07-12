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

    public function shoelace($output)
    {
        $data = json_decode($output, true);

        $xCoordinates = $data[0];
        $yCoordinates = $data[1];
    
        $xCoordinates[] = $xCoordinates[0];
        $yCoordinates[] = $yCoordinates[0];
    
        $sum = 0;
        $diff = 0;
        $count = count($xCoordinates);
    
        for ($i = 0; $i < $count - 1; $i++) {
            $sum += ($xCoordinates[$i] * $yCoordinates[$i + 1]);
            $diff -= ($xCoordinates[$i + 1] * $yCoordinates[$i]);
        }
    
        $area = abs(($sum + $diff) / 2);
    
        dd($area);

    }

    public function utm()
    {
        $geojson = '{"type":"FeatureCollection","features":[{"type":"Feature","properties":{},"geometry":{"type":"Polygon","coordinates":[[[111.949015,-7.24978],[111.949015,-7.24978],[111.949019,-7.25007],[111.949019,-7.25007],[111.949064,-7.25007],[111.949064,-7.25007],[111.949086,-7.250082],[111.949086,-7.250082],[111.949115,-7.250098],[111.949115,-7.250098],[111.949166,-7.250094],[111.949166,-7.250094],[111.949159,-7.249783],[111.949159,-7.249783],[111.949018,-7.249778],[111.949015,-7.24978]]]}}]}';

        $data = json_decode($geojson, true);
        $features = $data['features'];
    
        $lon = $features[0]['geometry']['coordinates'][0][0][0];
        $lat = $features[0]['geometry']['coordinates'][0][0][1];

        $proj4php = new Proj4php();

        $sourceProj = new Proj('EPSG:4326', $proj4php);  // Source coordinate system (e.g., WGS84)
        $targetProj = new Proj('EPSG:32749', $proj4php); // Target coordinate system (UTM zone 49s)

        $point = new Point($lon, $lat);
        $transformedPoint = $proj4php->transform($sourceProj, $targetProj, $point);


        $utmEasting = $transformedPoint->x; // UTM easting coordinate
        $utmNorthing = $transformedPoint->y; // UTM northing coordinate

        $X = [];
        $Y = [];
        foreach ($features[0]['geometry']['coordinates'][0] as $coordinate) {
            $point = new Point($coordinate[0], $coordinate[1]);
            $transformedPoint = $proj4php->transform($sourceProj, $targetProj, $point);
            $X[] = $transformedPoint->x;
            $Y[] = $transformedPoint->y;
        }
  
        $output = json_encode([$X, $Y]);

        $data = json_decode($output, true);

        $convertedArray = [];
        foreach ($data[0] as $index => $coordinate) {
            $x = $coordinate;
            $y = $data[1][$index];
            $convertedArray[] = [$x, $y];
        }
        // $output = str_replace('],[', '],[', $output);

        dd(json_encode($convertedArray));


        // $this->shoelace($output);
        // dd($output);

        
        // dd($X, $Y);
    }
}