<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kehadiran extends Model
{
    use HasFactory;

    protected $table ="kehadiran";
    protected $fillable = [
        'tanggal_masuk',
        'jam_masuk',
        'status',
        'jam_keluar',
        'lembur',
        'cuti',
        'id_karyawan'
    ];
}
