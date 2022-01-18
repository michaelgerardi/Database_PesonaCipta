<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data_Gaji extends Model
{
    use HasFactory;

    protected $table = "data_gaji";

    protected $fillable = [
        'gaji_pokok',
        'gaji_tunjangan',
        'thr',
        'bpjs',
        'id_karyawan'
    ];
}
