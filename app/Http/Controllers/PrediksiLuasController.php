<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataLahanModel;
use App\Models\PemilikLahanModel;
use App\Models\PrediksiLuasModel;


class PrediksiLuasController extends Controller
{
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
            'title'=> 'Data Prediksi Luas',
            'prediksiluas' => $this->PrediksiLuasModel->AllData(),
        ];
        return view('Admin.prediksiluas.v_index', $data);
    }
}
