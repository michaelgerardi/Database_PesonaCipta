<?php

namespace Database\Seeders;

use App\Models\Jabatan;
use Illuminate\Database\Seeder;

class JabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\Jabatan::factory(1)->create();
        $jabatan = new Jabatan();
        $jabatan->gol_jabatan="Manajer";
        $jabatan->persentase="";
    }
}
