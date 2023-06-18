<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DataLahanModel extends Model
{
    public function AllData()
    {
        return DB::table('tbl_datalahan')
        ->join('tbl_pemiliklahan', 'tbl_pemiliklahan.id_pemiliklahan', '=', 'tbl_datalahan.id_pemiliklahan')
        ->get();
    }

    public function InsertData($data)
    {
        DB::table('tbl_datalahan')->insert($data);

    }
}
