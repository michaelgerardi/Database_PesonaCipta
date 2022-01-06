<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKontrakKerjaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kontrak_kerja', function (Blueprint $table) {
            $table->id();
            $table->integer('nilai_kontrak');
            $table->date('awal_kontrak');
            $table->date('akhir_kontrak');
            $table->integer('durasi_kontrak');
            $table->string('lokasi');
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
        Schema::dropIfExists('kontrak_kerja');
    }
}
