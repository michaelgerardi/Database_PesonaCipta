<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataGajiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_gaji', function (Blueprint $table) {
            $table->id();
            $table->integer('gaji_pokok');
            $table->integer('gaji_tunjangan');
            $table->integer('thr');
            $table->integer('bpjs');
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
        Schema::dropIfExists('data_gaji');
    }
}
