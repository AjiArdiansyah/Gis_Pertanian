<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataLahanModel;
use App\Models\PemilikLahanModel;
use App\Models\PrediksiLuasModel;

use Illuminate\Support\Facades\DB;

use  App\Facades\Proj4phpFacade;
use proj4php\Proj4php;
use proj4php\Proj;
use proj4php\Point;


class PrediksiLuasController extends Controller
{
    protected $PemilikLahanModel;
    protected $DataLahanModel;
    protected $PrediksiLuasModel;

    public function __construct()
    {
        $this->PemilikLahanModel = new PemilikLahanModel();
        $this->DataLahanModel = new DataLahanModel();
        $this->PrediksiLuasModel = new PrediksiLuasModel();
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
                //'id_pemiliklahan' => 'required',
                //'id_datalahan' => 'required',


            ],
            [
                'prediksi.required' => 'Wajib Diisi !!!',
                //'nama_lahan.required' => 'Wajib Diisi !!!',
                //'id_pemiliklahan.required' => 'Wajib Diisi !!!',
                //'id_datalahan.required' => 'Wajib Diisi !!!',

            ]
        );


        $data = [
            'prediksi' => Request()->prediksi,
            'id_pemiliklahan' => Request()->id_pemiliklahan,
            'id_datalahan' => Request()->id_datalahan,


        ];
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


            ],
            [
                'prediksi.required' => 'Wajib Diisi !!!',
                'id_pemiliklahan.required' => 'Wajib Diisi !!!',
                'id_datalahan.required' => 'Wajib Diisi !!!',



            ]
        );

        $data = [
            'prediksi' => Request()->prediksi,
            'id_pemiliklahan' => Request()->id_pemiliklahan,
            'id_datalahan' => Request()->id_datalahan,


        ];
        $this->PrediksiLuasModel->UpdateData($id_prediksiluas, $data);
        return redirect()->route('prediksi_luas')->with('pesan', 'Data berhasil di Update.!!!');


        $this->PrediksiLuasModel->UpdateData($id_prediksiluas, $data);
        return redirect()->route('prediksi_luas')->with('pesan', 'Data Berhasil Update');
    }

    public function delete($id_prediksiluas)
    {
        $this->DataLahanModel->DeleteData($id_prediksiluas);
        return redirect()->route('prediksi_luas')->with('pesan', 'Data Berhasil Delete');
    }

    //UTM
    public function utm()
    {
        $prediksiluas = $this->PrediksiLuasModel->AllData();
        $utm = $this->PrediksiLuasModel->AllData();
        $pemiliklahan = $this->PemilikLahanModel->AllData();
        $datalahan = $this->DataLahanModel->AllData();

        $data = [
            'title' => 'Data Prediksi Luas',
            'prediksiluas' => $prediksiluas,
            'utm' => $utm,
            'pemiliklahan' => $pemiliklahan,
            'datalahan' => $datalahan,
        ];

        try {
            $geojson = DB::table('tbl_datalahan')->select('geojson')->first();
            if ($geojson && isset($geojson->geojson)) {
                $decodedData = json_decode($geojson->geojson);

                if ($decodedData && isset($decodedData->features[0]->geometry->coordinates[0])) {
                    $coordinates = $decodedData->features[0]->geometry->coordinates[0];

                    $lon = $coordinates[0][0];
                    $lat = $coordinates[0][1];

                    $proj4php = new \proj4php\Proj4php();
                    $sourceProj = new Proj('EPSG:4326', $proj4php);  // Source coordinate system (e.g., WGS84)
                    $targetProj = new Proj('EPSG:32749', $proj4php); // Target coordinate system (UTM zone 49s)


                    $point = new \proj4php\common\Point($lon, $lat);
                    $transformedPoint = \proj4php\Proj::transform($sourceProj, $targetProj, $point);

                    $utmEasting = $transformedPoint->x; // Koordinat easting UTM
                    $utmNorthing = $transformedPoint->y; // Koordinat northing UTM

                    return view('Admin.prediksiluas.v_utm', compact('data', 'utmEasting', 'utmNorthing'));
                }
            }
        } catch (\Exception $e) {
            // Menangani pengecualian atau kesalahan yang terjadi
            dd($e->getMessage());
        }

        // Penanganan jika data GeoJSON tidak valid atau tidak ditemukan
        $utmEasting = null;
        $utmNorthing = null;
        dd($prediksiluas);
        return view('Admin.prediksiluas.v_utm', compact('data', 'utmEasting', 'utmNorthing'));
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


    public function getid_luas($id)
    {
        $datluas = $this->PemilikLahanModel->getLuas($id);

        return response()->json($datluas);
    }
}
