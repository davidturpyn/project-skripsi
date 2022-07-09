<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDisabilitasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('disabilitas', function (Blueprint $table) {
            $table->unsignedBigInteger('id_lowongan_kerja');
            $table->foreign('id_lowongan_kerja')->references('id')->on('lowongan_kerjas')->onDelete('cascade');
            $table->unsignedBigInteger('id_macam_disabilitas');
            $table->foreign('id_macam_disabilitas')->references('id')->on('macam_disabilitas')->onDelete('cascade');
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
        Schema::dropIfExists('disabilitas');
    }
}
