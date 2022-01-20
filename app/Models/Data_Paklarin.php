<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data_Paklarin extends Model
{
    use HasFactory;

    protected $table = "data_paklarin";

    protected $fillable = [
        'nama_karyawan',
        'no_ktp',
        'tgl_awal_kerja',
        'tgl_akhir_kerja',
        'no_bpjs',
        'id_karyawan'
    ];


}
