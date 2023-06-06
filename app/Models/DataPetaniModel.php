<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DataPetaniModel extends Model
{
    public function AllData()
    {
        return DB::table('tbl_datapetani')->get();
    }

    public function InsertData($data)
    {
        DB::table('tbl_datapetani')->insert($data);

    }

    public function DetailData($id_petani)
    {
        return DB::table('tbl_datapetani')->where('id_petani', $id_petani)->first();
    }

    public function UpdateData($id_petani, $data)
    {
        DB::table('tbl_datapetani')
        ->where('id_petani', $id_petani)
        ->update($data);

    }
    
}
