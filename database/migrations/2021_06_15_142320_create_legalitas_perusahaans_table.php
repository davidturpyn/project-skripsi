<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLegalitasPerusahaansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('legalitas_perusahaans', function (Blueprint $table) {
            $table->id();
            $table->string('no_perizinan');
            $table->string('no_tdp');
            $table->string('npwp_perusahaan');
            $table->string('no_akta_perusahaan');
            $table->string('nama_pemilik');
            $table->string('alamat_pemilik');
            $table->string('nama_pengurus');
            $table->string('alamat_pengurus');
            $table->unsignedBigInteger('id_users');
            $table->foreign('id_users')->references('id')->on('users');
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
        Schema::dropIfExists('legalitas_perusahaans');
    }
}
