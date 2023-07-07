<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WilayahDesaModel;

class WilayahDesaController extends Controller
{
    protected $WilayahDesaModel;

    public function __construct()

    {
        $this->WilayahDesaModel = new WilayahDesaModel();
         //proteksi
       $this->middleware('auth');
    }


    public function index()
    {
        $data = [
            'title'=> 'Wilayah Desa',
            'wilayahdesa' => $this->WilayahDesaModel->AllData(),
        ];
        return view('Admin.wilayahdesa.v_index', $data);
    }

    public function add()
    {
        $data = [
            'title'=> 'Add Wilayah Desa',
        ];
        return view('Admin.wilayahdesa.v_add', $data);
    }

    public function insert()
    {
        Request()->validate(
        [
            'wilayah_desa' => 'required',
            'warna' => 'required',
            'geojson' => 'required',
            

        ],
        [
            'wilayah_desa.required' => 'Wajib Diisi !!!',
            'warna.required' => 'Wajib Diisi !!!',
            'geojson.required' => 'Wajib Diisi !!!',
            
        ]
    );

    //jika validasinya tidak ada maka lakukan simpan data ke database
    $data = [
        'wilayah_desa' => Request()->wilayah_desa,
        'warna' => Request()->warna,
        'geojson' => Request()->geosjon,
    ];
    $this->WilayahDesaModel->InsertData($data);
    return redirect()->route('wilayah_desa')->with('pesan','Data Berhasil Ditambahkan');
    }

    //edit
    public function edit($id_wilayahdesa)
    {
        $data = [
            'title'=> 'Edit Data Wilayah',
            'wilayahdesa' => $this->WilayahDesaModel->DetailData($id_wilayahdesa),
        ];
        return view('Admin.wilayahdesa.v_edit', $data);
    }

    public function update($id_wilayahdesa)
    {
        Request()->validate([
            'wilayah_desa' => 'required',
            'warna' => 'required',
            'geojson' => 'required',

        ],
        [
            'wilayah_desa.required' => 'Wajib Diisi !!!',
            'warna.required' => 'Wajib Diisi !!!',
            'geojson.required' => 'Wajib Diisi !!!',
        ]
    );

    //

    $data = [
        'wilayah_desa' => Request()->wilayah_desa,
        'warna' => Request()->warna,
        'geojson' => Request()->geojson,

    ];
    $this->WilayahDesaModel->UpdateData($id_wilayahdesa, $data);
    return redirect()->route('wilayah_desa')->with('pesan','Data Berhasil Update');
    }

    public function delete($id_wilayahdesa)
    {
        $this->WilayahDesaModel->DeleteData($id_wilayahdesa);
    return redirect()->route('wilayah_desa')->with('pesan','Data Berhasil Delete');
    }

    

}

