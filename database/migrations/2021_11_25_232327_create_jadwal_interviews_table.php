<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJadwalInterviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadwal_interviews', function (Blueprint $table) {
            $table->id();
            $table->string('nama_interview');
            $table->dateTime('tanggal_interview');
            $table->string('alamat_interview');
            $table->text('keterangan')->nullable();
            $table->timestamps();
            $table->unsignedBigInteger('id_lowongan_kerja');
            $table->foreign('id_lowongan_kerja')->references('id')->on('lowongan_kerjas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jadwal_interviews');
    }
}
