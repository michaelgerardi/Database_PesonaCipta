<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        $user->nip ="433121220";
        $user->nama_karyawan="Test Admin";
        $user->jenis_kelamin="1";
        $user->no_ktp="6499174525254985";
        

    }
}
