<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class WilayahModel extends Model
{
    public function DataWilayah()
    {
        return DB::table('tbl_wilayahdesa')->get();
    }
}
