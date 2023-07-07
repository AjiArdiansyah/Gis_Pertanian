<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PrediksiLuasModel extends Model
{
    public function AllData()
    {
        return DB::table('tbl_prediksiluas')
        ->join('tbl_pemiliklahan', 'tbl_pemiliklahan.id_pemiliklahan', '=', 'tbl_prediksiluas.id_pemiliklahan')
        ->join('tbl_datalahan', 'tbl_datalahan.id_datalahan', '=', 'tbl_prediksiluas.id_datalahan')
        ->get();
    }

    public function InsertData($data)
    {
        DB::table('tbl_prediksiluas')->insert($data);

    }

    public function DetailData($id_prediksiluas)
    {
        return DB::table('tbl_prediksiluas')
        ->join('tbl_pemiliklahan', 'tbl_pemiliklahan.id_pemiliklahan', '=', 'tbl_prediksiluas.id_pemiliklahan')
        ->join('tbl_datalahan', 'tbl_datalahan.id_datalahan', '=', 'tbl_prediksiluas.id_datalahan')
        ->where('id_prediksiluas', $id_prediksiluas)->first();
    }

    public function UpdateData($id_prediksiluas, $data)
    {
        DB::table('tbl_prediksiluas')
        ->where('id_datalahan', $id_prediksiluas)
        ->update($data);

    }

    public function DeleteData($id_prediksiluas)
    {
        DB::table('tbl_prediksiluas')
        ->where('id_datalahan', $id_prediksiluas)
        ->delete();
    }

   
}
