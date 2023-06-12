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
}
