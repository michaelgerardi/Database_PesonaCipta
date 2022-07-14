<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKehadiranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('kehadiran');
        Schema::create('kehadiran', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_masuk');
            $table->time('jam_masuk');
            $table->time('jam_keluar');
            $table->time('lembur');
            $table->date('cuti');
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
        Schema::dropIfExists('kehadiran');
    }
}
