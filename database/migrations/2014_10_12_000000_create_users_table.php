<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::dropIfExists('users');
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->integer('nip');
            $table->string('nama_karyawan',30);
            $table->char('jenis_kelamin',1);
            $table->char('no_ktp',16);
            $table->char('no_kk',16);
            $table->char('status',1);
            $table->integer('jml_tanggungan');
            $table->string('alamat',50);
            $table->char('umur',2);
            $table->date('tgl_lahir');
            $table->char('npwp',16);
            $table->char('no_rek',11);
            $table->string('email')->unique();
            $table->string('no_bpjs',13);
            $table->string('password',10);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
