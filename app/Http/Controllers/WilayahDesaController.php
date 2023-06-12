<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WilayahDesaModel;

class WilayahDesaController extends Controller
{
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
}
