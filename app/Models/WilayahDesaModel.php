<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class WilayahDesaModel extends Model
{
    public function AllData()
    {
        return DB::table('tbl_wilayahdesa')->get();
    }

    public function InsertData($data)
    {
        DB::table('tbl_wilayahdesa')->insert($data);

    }

    public function DetailData($id_wilayahdesa)
    {
        return DB::table('tbl_wilayahdesa')->where('id_wilayahdesa', $id_wilayahdesa)->first();
    }

    public function UpdateData($id_wilayahdesa, $data)
    {
        DB::table('tbl_wilayahdesa')
        ->where('id_wilayahdesa', $id_wilayahdesa)
        ->update($data);

    }

    public function DeleteData($id_wilayahdesa)
    {
        DB::table('tbl_wilayahdesa')
        ->where('id_wilayahdesa', $id_wilayahdesa)
        ->delete();
    }
}
