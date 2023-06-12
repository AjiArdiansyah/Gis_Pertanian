<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataPetaniModel;

class DataPetaniController extends Controller
{
    
    public function __construct()
    {
       $this->DataPetaniModel = new DataPetaniModel();
       //proteksi
       $this->middleware('auth');
    }
    
    public function index()
    {
        $data = [
            'title'=> 'DataPetani',
            'datapetani' => $this->DataPetaniModel->AllData(),
        ];
        return view('Admin.datapetani.v_index', $data);
    }

    //tambah data

    public function add()
    {
        $data = [
            'title'=> 'Add Data Petani',
        ];
        return view('Admin.datapetani.v_add', $data);
    }
    
    public function insert()
    {
        Request()->validate([
            'nama_petani' => 'required',
            'alamat' => 'required',
            'tanggal_lahir' => 'required',
            'luas' => 'required',

        ],
        [
            'nama_petani.required' => 'Wajib Diisi !!!',
            'alamat.required' => 'Wajib Diisi !!!',
            'tanggal_lahir.required' => 'Wajib Diisi !!!',
            'luas.required' => 'Wajib Diisi !!!',
        ]
    );

    //

    $data = [
        'nama_petani' => Request()->nama_petani,
        'alamat' => Request()->alamat,
        'tanggal_lahir' => Request()->tanggal_lahir,
        'luas' => Request()->luas,

    ];
    $this->DataPetaniModel->InsertData($data);
    return redirect()->route('data_petani')->with('pesan','Data Berhasil Ditambahkan');
    }

    public function edit($id_petani)
    {
        $data = [
            'title'=> 'Edit Data Petani',
            'datapetani' => $this->DataPetaniModel->DetailData($id_petani),
        ];
        return view('Admin.datapetani.v_edit', $data);
    }

    public function update($id_petani)
    {
        Request()->validate([
            'nama_petani' => 'required',
            'alamat' => 'required',
            'tanggal_lahir' => 'required',
            'luas' => 'required',

        ],
        [
            'nama_petani.required' => 'Wajib Diisi !!!',
            'alamat.required' => 'Wajib Diisi !!!',
            'tanggal_lahir.required' => 'Wajib Diisi !!!',
            'luas.required' => 'Wajib Diisi !!!',
        ]
    );

    //

    $data = [
        'nama_petani' => Request()->nama_petani,
        'alamat' => Request()->alamat,
        'tanggal_lahir' => Request()->tanggal_lahir,
        'luas' => Request()->luas,

    ];
    $this->DataPetaniModel->UpdateData($id_petani, $data);
    return redirect()->route('data_petani')->with('pesan','Data Berhasil Update');
    }

    public function delete($id_petani)
    {
        $this->DataPetaniModel->DeleteData($id_petani);
    return redirect()->route('data_petani')->with('pesan','Data Berhasil Delete');
    }
}

