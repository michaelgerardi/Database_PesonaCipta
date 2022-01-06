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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->integer('nip');
            $table->string('nama_karyawan');
            $table->char('jenis_kelamin');
            $table->char('no_ktp');
            $table->char('no_kk');
            $table->char('status');
            $table->integer('jml_tanggungan');
            $table->string('alamat');
            $table->char('umur');
            $table->date('tgl_lahir');
            $table->char('npwp');
            $table->char('no_rek');
            $table->string('email')->unique();
            $table->string('no_bpjs');
            $table->string('password');
            $table->bigInteger('id_jabatan');
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
