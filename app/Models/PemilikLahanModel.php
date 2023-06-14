<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PemilikLahanModel extends Model
{
    public function AllData()
    {
        return DB::table('tbl_pemiliklahan')->get();
    }

    public function InsertData($data)
    {
        DB::table('tbl_pemiliklahan')->insert($data);

    }

    public function DetailData($id_pemiliklahan)
    {
        return DB::table('tbl_pemiliklahan')->where('id_pemiliklahan', $id_pemiliklahan)->first();
    }

    public function UpdateData($id_pemiliklahan, $data)
    {
        DB::table('tbl_pemiliklahan')
        ->where('id_pemiliklahan', $id_pemiliklahan)
        ->update($data);

    }

    public function DeleteData($id_pemiliklahan)
    {
        DB::table('tbl_pemiliklahan')
        ->where('id_pemiliklahan', $id_pemiliklahan)
        ->delete();
    }
    
}
