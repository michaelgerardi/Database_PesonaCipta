<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History_Gaji extends Model
{
    use HasFactory;

    protected $table = "history_gaji";
    protected $fillable = [
        'tanggal_gaji',
        'status',
        'id_gaji_karyawan'
    ];
}
