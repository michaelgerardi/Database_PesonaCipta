<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presensi extends Model
{
    use HasFactory;

    protected $table = "presensi";
    protected $fillable = [
        'tanggal_masuk',
        'presen_masuk',
        'presen_pulang',
        'id_karyawan'
    ];
}
