<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataPaklarinTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_paklarin', function (Blueprint $table) {
            $table->id();
            $table->string('nama_karyawan');
            $table->char('no_ktp');
            $table->date('tgl_awal_kerja');
            $table->date('tgl_akhir_kerja');
            $table->char('no_bpjs');
            $table->bigInteger('id_karyawan');
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
        Schema::dropIfExists('data_paklarin');
    }
}
