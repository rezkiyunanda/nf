<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePelanggaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pelanggarans', function (Blueprint $table) {
          $table->unsignedInteger('tilang_id');
          $table->unsignedInteger('pasal_id');
          $table->timestamps();

          $table->foreign('tilang_id')->references('id')->on('tilangs');
          $table->foreign('pasal_id')->references('id')->on('pasals');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pelanggarans');
    }
}
