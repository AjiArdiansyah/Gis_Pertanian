<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WilayahBanjirModel;

class WilayahBanjirController extends Controller
{
    public function __construct()

    {
        $this->WilayahBanjirModel = new WilayahBanjirModel();
        //proteksi
        $this->middleware('auth');
    }


    public function index()
    {
        $data = [
            'title' => 'Wilayah Desa',
            'wilayahbanjir' => $this->WilayahBanjirModel->AllData(),
        ];
        return view('Admin.rawanbanjir.v_index', $data);
    }

    public function add()
    {
        $data = [
            'title' => 'Add Wilayah Rawan Banjir',
        ];
        return view('Admin.rawanbanjir.v_add', $data);
    }

    public function insert()
    {
        Request()->validate(
            [
                'wilayah_banjir' => 'required',
                'warna' => 'required',
                'geojson' => 'required',
                'keterangan' => 'required',


            ],
            [
                'wilayah_banjir.required' => 'Wajib Diisi !!!',
                'warna.required' => 'Wajib Diisi !!!',
                'geojson.required' => 'Wajib Diisi !!!',
                'keterangan.required' => 'Wajib Diisi !!!',

            ]
        );

        //jika validasinya tidak ada maka lakukan simpan data ke database
        $data = [
            'wilayah_banjir' => Request()->wilayah_banjir,
            'warna' => Request()->warna,
            'geojson' => Request()->geojson,
            'keterangan' => Request()->keterangan,
        ];
        $this->WilayahBanjirModel->InsertData($data);
        return redirect()->route('wilayah_banjir')->with('pesan', 'Data Berhasil Ditambahkan');
    }

    //edit
    public function edit($id_rawanbanjir)
    {
        $data = [
            'title' => 'Edit Data Wilayah',
            'wilayahbanjir' => $this->WilayahBanjirModel->DetailData($id_rawanbanjir),
        ];
        return view('Admin.rawanbanjir.v_edit', $data);
    }

    public function update($id_rawanbanjir)
    {
        Request()->validate(
            [
                'wilayah_banjir' => 'required',
                'warna' => 'required',
                //'geojson' => 'required',
                'keterangan' => 'required',

            ],
            [
                'wilayah_banjir.required' => 'Wajib Diisi !!!',
                'warna.required' => 'Wajib Diisi !!!',
                //'geojson.required' => 'Wajib Diisi !!!',
                'keterangan.required' => 'Wajib Diisi !!!',
            ]
        );

        //

        $data = [
            'wilayah_banjir' => Request()->wilayah_banjir,
            'warna' => Request()->warna,
            'geojson' => Request()->geojson,
            'keterangan' => Request()->keterangan,

        ];
        $this->WilayahBanjirModel->UpdateData($id_rawanbanjir, $data);
        return redirect()->route('wilayah_banjir')->with('pesan', 'Data Berhasil Update');
    }

    public function delete($id_rawanbanjir)
    {
        $this->WilayahBanjirModel->DeleteData($id_rawanbanjir);
        return redirect()->route('wilayah_banjir')->with('pesan', 'Data Berhasil Delete');
    }
}
