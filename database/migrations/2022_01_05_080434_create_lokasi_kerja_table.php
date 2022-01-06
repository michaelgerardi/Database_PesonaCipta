<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLokasiKerjaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lokasi_kerja', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lokasi');
            $table->string('alamat_lokasi');
            $table->char('kode_pos');
            $table->bigInteger('id_kontrak_kerja');
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
        Schema::dropIfExists('lokasi_kerja');
    }
}
