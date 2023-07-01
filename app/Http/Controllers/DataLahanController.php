<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataLahanModel;
use App\Models\PemilikLahanModel;

class DataLahanController extends Controller
{
    public function __construct()
    {
       $this->DataLahanModel = new DataLahanModel();
       $this->PemilikLahanModel = new PemilikLahanModel();
       //proteksi
       $this->middleware('auth');
    }

    public function index()
    {
        $data = [
            'title'=> 'Data Lahan',
            'datalahan' => $this->DataLahanModel->AllData(),
        ];
        return view('Admin.datalahan.v_index', $data);
    }

    //Tambah data
    public function add()
    {
        $data = [
            'title'=> 'Add Data Lahan',
            'pemiliklahan' => $this->PemilikLahanModel->AllData(),
        ];
        return view('Admin.datalahan.v_add', $data);
    }
    
    public function insert()
    {
        Request()->validate([
            'nama_lahan' => 'required',
            'id_pemiliklahan' => 'required',
            'keterangan' => 'required',
            'gambar' => '|max:2024',
            'geojson' => 'required',

        ],
        [
            'nama_lahan.required' => 'Wajib Diisi !!!',
            'id_pemiliklahan.required' => 'Wajib Diisi !!!',
            'keterangan.required' => 'Wajib Diisi !!!',
            
            'geojson.required' => 'Wajib Diisi !!!',
        ]
    );

    $file = Request()->gambar;
    $filename = $file->getClientOriginalName();
    $file->move(public_path('gambar'), $filename);

    $data = [
        'nama_lahan' => Request()->nama_lahan,
        'id_pemiliklahan' => Request()->id_pemiliklahan,
        'keterangan' => Request()->keterangan,
        'gambar' => $filename,
        'geojson' => Request()->geojson,

    ];
    $this->DataLahanModel->InsertData($data);
    return redirect()->route('data_lahan')->with('pesan','Data Berhasil Ditambahkan');
    }

    public function edit($id_datalahan)
    {
        $data = [
            'title'=> 'Edit Data Lahan',
            'datalahan' => $this->DataLahanModel->DetailData($id_datalahan),
            'pemiliklahan' => $this->PemilikLahanModel->AllData(),
        ];
        return view('Admin.datalahan.v_edit', $data);
    }

    public function update($id_datalahan)
    {
        Request()->validate([
            'nama_lahan' => 'required',
            'id_pemiliklahan' => 'required',
            'keterangan' => 'required',
            'gambar' => 'max:1024',
           

        ],
        [
            'nama_lahan.required' => 'Wajib Diisi !!!',
            'id_pemiliklahan.required' => 'Wajib Diisi !!!',
            'keterangan.required' => 'Wajib Diisi !!!',
            
           
        ]
    );

    if (Request() ->gambar <> ""){
        //hapus foto lama
        $datalahan = $this->DataLahanModel->DetailData($id_datalahan);
        if($datalahan->gambar <> ""){
            unlink(public_path('gambar') . '/' . $datalahan->gambar);
        }

        //jika ingin ganti gambar
        $file = Request()->gambar;
        $filename = $file->GetClientOriginalExtension();
        $file->move(public_path('gambar'), $filename);

        $data = [
            'nama_lahan' => Request()->nama_lahan,
            'id_pemiliklahan' => Request()->id_pemiliklahan,
            'keterangan' => Request()->keterangan,
            'gambar' => $filename,
            'geojson' => Request()->geojson,
    
        ];
        $this->DataLahanModel->UpdateData($id_datalahan, $data);
        
    } else {
        $data = [
            'nama_lahan' => Request()->nama_lahan,
            'id_pemiliklahan' => Request()->id_pemiliklahan,
            'keterangan' => Request()->keterangan,
            
            'geojson' => Request()->geojson,
    
        ];
        $this->DataLahanModel->UpdateData($id_datalahan, $data);
    }
    return redirect()->route('data_lahan')->with('pesan', 'Data berhasil di Update.!!!');

   
    $this->DataLahanModel->UpdateData($id_datalahan, $data);
    return redirect()->route('data_lahan')->with('pesan','Data Berhasil Update');
    }

    public function delete($id_datalahan)
    {
        //hapus data gambar
        $datalahan = $this->DataLahanModel->DetailData($id_datalahan);
        if ($datalahan->gambar <> "") {
            unlink(public_path('gambar') . '/' . $datalahan->gambar);
        }

        $this->DataLahanModel->DeleteData($id_datalahan);
    return redirect()->route('data_lahan')->with('pesan','Data Berhasil Delete');
    }
}
