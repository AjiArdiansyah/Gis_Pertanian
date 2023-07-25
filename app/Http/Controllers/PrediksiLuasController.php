<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataLahanModel;
use App\Models\PemilikLahanModel;
use App\Models\PrediksiLuasModel;
use App\Models\WilayahDesaModel;
use App\Models\WilayahBanjirModel;

use Illuminate\Support\Facades\DB;

use  App\Facades\Proj4phpFacade;
use proj4php\Proj4php;
use proj4php\Proj;
use proj4php\Point;
//use proj4php\Proj4php\Point;

//use proj4php\common\Point;






class PrediksiLuasController extends Controller
{
    protected $PemilikLahanModel;
    protected $DataLahanModel;
    protected $PrediksiLuasModel;
    protected $WilayahDesaModel;
    protected $WilayahBanjirModel;

    public function __construct()
    {
        $this->PemilikLahanModel = new PemilikLahanModel();
        $this->DataLahanModel = new DataLahanModel();
        $this->PrediksiLuasModel = new PrediksiLuasModel();
        $this->WilayahDesaModel = new WilayahDesaModel();
        $this->WilayahBanjirModel = new WilayahBanjirModel();

        //proteksi
        $this->middleware('auth');
    }

    public function index()
    {
        $data = [
            'title' => 'Data Prediksi Luas',
            'prediksiluas' => $this->PrediksiLuasModel->AllData(),
            'pemiliklahan' => $this->PemilikLahanModel->AllData(),
            'datalahan' => $this->DataLahanModel->AllData(),
        ];
        return view('Admin.prediksiluas.v_index', $data);
        return view('Admin.prediksiluas.v_utm', $data);
    }

    public function dataUTM()
    {
        $data = [
            'title' => 'Data Prediksi Luas',
            'prediksiluas' => $this->PrediksiLuasModel->AllData(),
            'pemiliklahan' => $this->PemilikLahanModel->AllData(),
            'datalahan' => $this->DataLahanModel->AllData(),
        ];
        //return view('Admin.prediksiluas.v_index', $data);
        return view('Admin.prediksiluas.v_utm', $data);
    }

    public function dataSHOELACE()
    {
        $data = [
            'title' => 'Data Prediksi Luas',
            'prediksiluas' => $this->PrediksiLuasModel->AllData(),
            'pemiliklahan' => $this->PemilikLahanModel->AllData(),
            'datalahan' => $this->DataLahanModel->AllData(),
        ];
        //return view('Admin.prediksiluas.v_index', $data);
        return view('Admin.prediksiluas.v_shoelace', $data);
    }

    //Tambah data
    public function add()
    {
        $data = [
            'title' => 'Add Data Prediksi',
            'pemiliklahan' => $this->PemilikLahanModel->AllData(),
            'datalahan' => $this->DataLahanModel->AllData(),
        ];
        return view('Admin.prediksiluas.v_add', $data);
    }

    public function insert()
    {
        
        Request()->validate(
            [
                'prediksi' => 'required',
                //'nama_lahan' => 'required',
                'id_pemiliklahan' => 'required',
                'id_datalahan' => 'required',
                // 'geojson' => 'geojson'

            ],
            [
                'prediksi.required' => 'Wajib Diisi !!!',
                //'nama_lahan.required' => 'Wajib Diisi !!!',
                'id_pemiliklahan.required' => 'Wajib Diisi !!!',
                'id_datalahan.required' => 'Wajib Diisi !!!',
                // 'geojson.required' => 'Wajib Diisi'

            ]
        );

        $result = $this->utm(Request()->geojson);

        $data = [
            'prediksi' => Request()->prediksi,
            'id_pemiliklahan' => Request()->id_pemiliklahan,
            'id_datalahan' => Request()->id_datalahan,
            'shoelace' => $result['area'],
            'utm' => $result['nilaiUTM'],


        ];


        // dd($data);
        // PrediksiLuasModel::InsertData($data);

         $this->PrediksiLuasModel->InsertData($data);
         return redirect()->route('prediksi_luas')->with('pesan', 'Data Berhasil Ditambahkan');
       
    }


    //edit
    public function edit($id_prediksiluas)
    {
        $data = [
            'title' => 'Edit Data Prediksi',
            'prediksiluas' => $this->PrediksiLuasModel->DetailData($id_prediksiluas),
            'pemiliklahan' => $this->PemilikLahanModel->AllData(),
            'datalahan' => $this->DataLahanModel->AllData(),
        ];
        return view('Admin.prediksiluas.v_edit', $data);
    }

    public function update($id_prediksiluas)
    {
        Request()->validate(
            [
                'prediksi' => 'required',
                'id_pemiliklahan' => 'required',
                'id_datalahan' => 'required',
                'geojson' => 'required',


            ],
            [
                'prediksi.required' => 'Wajib Diisi !!!',
                'id_pemiliklahan.required' => 'Wajib Diisi !!!',
                'id_datalahan.required' => 'Wajib Diisi !!!',
                'geojson.required' => 'Wajib Diisi !!!',



            ]
        );
        $result = $this->utm(Request()->geojson);

        $data = [
            'prediksi' => Request()->prediksi,
            'id_pemiliklahan' => Request()->id_pemiliklahan,
            'id_datalahan' => Request()->id_datalahan,
            'shoelace' => $result['area'],
            'utm' => $result['nilaiUTM'],

        ];

        // $this->PrediksiLuasModel->UpdateData($id_prediksiluas, $data);
        // return redirect()->route('prediksi_luas')->with('pesan', 'Data berhasil di Update.!!!');


        $this->PrediksiLuasModel->UpdateData($id_prediksiluas, $data);
        
        return redirect()->route('prediksi_luas')->with('pesan', 'Data Berhasil Update');
    }

    public function delete($id_prediksiluas)
    {
        $this->PrediksiLuasModel->DeleteData($id_prediksiluas);
        return redirect()->route('prediksi_luas')->with('pesan', 'Data Berhasil Delete');
    }

  


    public function getid_datalahan($id)
    {
        $datalahan = $this->DataLahanModel->getPemilikLahan($id);


        return response()->json($datalahan);
    }


    public function getid_geojson($id)
    {
        $datgeojson = $this->DataLahanModel->getGeojson($id);

        return response()->json($datgeojson);
    }

    public function getid_pemiliklahan($id)
    {
        $pemiliklahan = $this->PemilikLahanModel->getLuasPemilikLahan($id);


        return response()->json($pemiliklahan);
    }

    public function get_datalahan()
    {
        $datalahan = $this->DataLahanModel->AllData();


        return response()->json($datalahan);
    }

    public function get_wilayahdesa()
    {
        $wilayahdesa = $this->WilayahDesaModel->AllData();


        return response()->json($wilayahdesa);
    }

    public function get_wilayahbanjir()
    {
        $wilayahbanjir = $this->WilayahBanjirModel->AllData();


        return response()->json($wilayahbanjir);
    }

    public function getid_luas($id)
    {
        //$datluas = $this->PemilikLahanModel->getLuas($id);

        $luas = DB::table('tbl_datalahan')->where('id_datalahan', $id)->first();
        //return response()->json($datluas);
        return response()->json($luas);
    }

    public function utm($geojson)
    {

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
        // $output = str_replace('],[', '],[', $output);

        $data = json_decode($output, true);

        $convertedArray = [];
        foreach ($data[0] as $index => $coordinate) {
            $x = $coordinate;
            $y = $data[1][$index];
            $convertedArray[] = [$x, $y];
        }
        $area = $this->shoelace($output);

        $nilaiUTM = json_encode($convertedArray);

        return compact('area', 'nilaiUTM');
        // dd($output);
        // dd($X, $Y);
    }

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

        return $area;
    
        // dd($area);

    }

    
}
