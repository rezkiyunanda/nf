<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKorbanKendaraansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('korban_kendaraans', function (Blueprint $table) {
            $table->unsignedInteger('no_ktp');
            $table->unsignedInteger('no_plat');
            $table->string('nama');
            $table->string('jenis_kelamin');
            $table->string('umur');
            $table->string('kondisi');
            $table->timestamps();

            $table->primary('no_ktp');
            $table->foreign('no_plat')->references('no_plat')->on('kendaraans');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('korban_kendaraans');
    }
}
