<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = [
            'title'=> 'Dasboard',
            'pemiliklahan' => DB::table('tbl_pemiliklahan')->count(),
            'datalahan' => DB::table('tbl_datalahan')->count(),
            'user' => DB::table('users')->count(),
            'prediksiluas' => DB::table('tbl_prediksiluas')->count(),
        ];
        return view('v_home', $data);
    }
}
