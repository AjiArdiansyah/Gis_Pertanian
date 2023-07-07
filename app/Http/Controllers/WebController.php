<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WilayahModel;

class WebController extends Controller
{
    protected $WilayahModel; 

    public function __construct()

    {
        $this->WilayahModel = new WilayahModel();
       
    }

    public function index()
    {
        $data = [
            'title'=> 'Pemetaan',
            'wilayahdesa' => $this->WilayahModel->DataWilayah(),
        ];
        return view('layouts.v_web', $data);
    }
}
