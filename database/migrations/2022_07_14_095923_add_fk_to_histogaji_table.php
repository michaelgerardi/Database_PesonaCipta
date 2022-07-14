<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFkToHistogajiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('history_gaji', function (Blueprint $table) {
            $table->bigInteger('id_gaji_karyawan')->unsigned();
            $table->foreign('id_gaji_karyawan')->references('id')->on('data_gaji');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('history_gaji', function (Blueprint $table) {
            //
        });
    }
}
