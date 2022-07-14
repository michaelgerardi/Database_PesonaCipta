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
            $table->string('nama_lokasi',30);
            $table->string('alamat_lokasi',300);
            $table->char('kode_pos',5);
            $table->char('no_telp',10);
            $table->char('fax',10);
            $table->integer('umr');
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
