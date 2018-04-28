<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKendaraansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kendaraans', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('no_plat');               
            $table->unsignedInteger('kecelakaan_id');
            $table->string('nama');
            $table->string('alamat');
            $table->string('umur');
            $table->string('sim');
            $table->string('status_disita');
            $table->string('merek');
            $table->string('kondisi_kendaraan');
            $table->string('jenis_kendaraan');
            $table->string('status_kerugian');
            $table->integer('no_reg_bb');
            $table->integer('kerugian');
            $table->string('status');
            $table->timestamps();

            $table->foreign('kecelakaan_id')->references('id')->on('kecelakaans');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kendaraans');
    }
}
