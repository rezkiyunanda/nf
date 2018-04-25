<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTilangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tilangs', function (Blueprint $table) {
             $table->increments('id');
          $table->unsignedInteger('petugas_id');
          $table->unsignedInteger('no_sim');
          $table->unsignedInteger('no_stnk');
          $table->unsignedInteger('merek');
          $table->unsignedInteger('jenis_kendaraan_id');

          $table->string('nama_pelanggar');
          $table->string('keterangan');
          $table->unsignedInteger('no_plat');

          $table->timestamps();

          $table->foreign('petugas_id')->references('id')->on('users');
          
          $table->foreign('jenis_kendaraan_id')->references('id')->on('jenis_kendaraans');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tilangs');
    }
}
