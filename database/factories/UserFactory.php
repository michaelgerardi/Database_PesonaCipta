<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nip' => '321202147',
            'nama_karyawan' => 'Alfon Pelita',
            'jenis_kelamin' => '1',
            'no_ktp' => '12377213823000001',
            'no_kk' => '98262157823220001',
            'status' => '1',
            'jml_tanggungan' => '3',
            'alamat' => 'Jalan Kabupaten No 31',
            'umur' => '34',
            'tgl_lahir' => '1987-10-22',
            'npwp' => '125896526400993',
            'no_rek' => '5698741236',
            'email' => 'alfonganteng@gmail.com',
            'no_bpjs' => '1257190023445',
            'password' => Hash::make('123456789'),
            'masa_jabatan' => '6',
            'id_jabatan' => '4',
            'id_divisi' => '1'
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
