<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PemilikLahanModel;

class PemilikLahanController extends Controller
{
    
    public function __construct()
    {
       $this->PemilikLahanModel = new PemilikLahanModel();
       //proteksi
       $this->middleware('auth');
    }
    
    public function index()
    {
        $data = [
            'title'=> 'Data Pemilik Lahan',
            'pemiliklahan' => $this->PemilikLahanModel->AllData(),
        ];
        return view('Admin.pemiliklahan.v_index', $data);
    }

    //tambah data

    public function add()
    {
        $data = [
            'title'=> 'Add Data Pemilik Lahan',
        ];
        return view('Admin.pemiliklahan.v_add', $data);
    }
    
    public function insert()
    {
        Request()->validate([
            'nama_pemilik' => 'required',
            'alamat' => 'required',
            'tanggal_lahir' => 'required',
            'luas' => 'required',

        ],
        [
            'nama_pemilik.required' => 'Wajib Diisi !!!',
            'alamat.required' => 'Wajib Diisi !!!',
            'tanggal_lahir.required' => 'Wajib Diisi !!!',
            'luas.required' => 'Wajib Diisi !!!',
        ]
    );

    //

    $data = [
        'nama_pemilik' => Request()->nama_pemilik,
        'alamat' => Request()->alamat,
        'tanggal_lahir' => Request()->tanggal_lahir,
        'luas' => Request()->luas,

    ];
    $this->PemilikLahanModel->InsertData($data);
    return redirect()->route('pemilik_lahan')->with('pesan','Data Berhasil Ditambahkan');
    }

    public function edit($id_pemiliklahan)
    {
        $data = [
            'title'=> 'Edit Data Pemilik Lahan',
            'pemiliklahan' => $this->PemilikLahanModel->DetailData($id_pemiliklahan),
        ];
        return view('Admin.pemiliklahan.v_edit', $data);
    }

    public function update($id_pemiliklahan)
    {
        Request()->validate([
            'nama_pemilik' => 'required',
            'alamat' => 'required',
            'tanggal_lahir' => 'required',
            'luas' => 'required',

        ],
        [
            'nama_pemilik.required' => 'Wajib Diisi !!!',
            'alamat.required' => 'Wajib Diisi !!!',
            'tanggal_lahir.required' => 'Wajib Diisi !!!',
            'luas.required' => 'Wajib Diisi !!!',
        ]
    );

    //

    $data = [
        'nama_pemilik' => Request()->nama_pemilik,
        'alamat' => Request()->alamat,
        'tanggal_lahir' => Request()->tanggal_lahir,
        'luas' => Request()->luas,

    ];
    $this->PemilikLahanModel->UpdateData($id_pemiliklahan, $data);
    return redirect()->route('pemilik_lahan')->with('pesan','Data Berhasil Update');
    }

    public function delete($id_pemiliklahan)
    {
        $this->PemilikLahanModel->DeleteData($id_pemiliklahan);
    return redirect()->route('pemilik_lahan')->with('pesan','Data Berhasil Delete');
    }
}

