<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DivisiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Divisi::factory(1)->create();
    }
}
