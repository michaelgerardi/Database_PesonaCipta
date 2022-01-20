<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kontrak_Kerja extends Model
{
    use HasFactory;

    protected $table = "kontrak_kerja";
    protected $fillable = [
        'nilai_kontrak',
        'awal_kontrak',
        'akhir_kontrak',
        'durasi_kontrak',
        'lokasi',
        'id_karyawan'
    ];
}
