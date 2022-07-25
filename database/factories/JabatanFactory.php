<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class JabatanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'gol_jabatan' => '1',
            'persentase' => '62'
        ];
    }
}
