<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class WilayahBanjirModel extends Model
{
    public function AllData()
    {
        return DB::table('tbl_rawanbanjir')->get();
    }

    public function InsertData($data)
    {
        DB::table('tbl_rawanbanjir')->insert($data);

    }

    public function DetailData($id_rawanbanjir)
    {
        return DB::table('tbl_rawanbanjir')->where('id_rawanbanjir', $id_rawanbanjir)->first();
    }

    public function UpdateData($id_rawanbanjir, $data)
    {
        DB::table('tbl_rawanbanjir')
        ->where('id_rawanbanjir', $id_rawanbanjir)
        ->update($data);

    }

    public function DeleteData($id_rawanbanjir)
    {
        DB::table('tbl_rawanbanjir')
        ->where('id_rawanbanjir', $id_rawanbanjir)
        ->delete();
    }
}
