<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKorbanKecelakaansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('korban_kecelakaans', function (Blueprint $table) {
            $table->unsignedInteger('no_ktp');
            $table->unsignedInteger('kecelakaan_id');
            $table->string('nama');
            $table->string('jenis_kelamin');
            $table->string('umur');
            $table->string('kondisi');
            $table->timestamps();

            $table->primary('no_ktp');
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
        Schema::dropIfExists('korban_kecelakaans');
    }
}
