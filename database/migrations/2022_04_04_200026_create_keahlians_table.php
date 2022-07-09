<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKeahliansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keahlians', function (Blueprint $table) {
            $table->unsignedBigInteger('id_lowongan_kerja');
            $table->foreign('id_lowongan_kerja')->references('id')->on('lowongan_kerjas')->onDelete('cascade');
            $table->unsignedBigInteger('id_keahlian');
            $table->foreign('id_keahlian')->references('id')->on('macam_keahlians')->onDelete('cascade');
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
        Schema::dropIfExists('keahlians');
    }
}
