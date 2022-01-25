<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lokasi_Kerja extends Model
{
    use HasFactory;

    protected $table = "lokasi_kerja";
    protected $fillable = [
        'nama_lokasi',
        'alamat_lokasi',
        'kode_pos',
        'no_telp',
        'fax'
    ];
}
