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
        return view('Admin.datapetani/v_index', $data);
    }
}
