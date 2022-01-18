<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History_Gaji extends Model
{
    use HasFactory;

    protected $table = "divisi";
    protected $fillable = [
        'tanggal_gaji',
        'status',
        'id_gaji_karyawan'
    ];
}
