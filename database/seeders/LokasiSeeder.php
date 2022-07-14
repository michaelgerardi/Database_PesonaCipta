<?php

namespace Database\Seeders;

use App\Models\Lokasi_Kerja;
use Illuminate\Database\Seeder;

class LokasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $lok_kerja = new Lokasi_Kerja();
        $lok_kerja->nama_lokasi="Mandiri Yogyakarta Sudirman";
        $lok_kerja->alamat_lokasi="Jl. Jend. Sudirman No.26, Gowongan, Kec. Jetis, Kota Yogyakarta, Daerah Istimewa Yogyakarta";
        $lok_kerja->kode_pos="55233";
        $lok_kerja->no_telp="0274586425";
        $lok_kerja->fax="0274586425";
        $lok_kerja->umr="1800000";
        $lok_kerja->save();
    }
}
