<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Divisi;

class DivisiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Divisi::factory(4)->create();
        $divisi = new Divisi;
        $divisi->divisi="Keuangan";
    }
}
