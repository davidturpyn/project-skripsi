<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePendidikansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendidikans', function (Blueprint $table) {
            $table->id();
            $table->string('sekolah');
            $table->string('bidang_studi')->nullable();
            $table->string('tingkat');
            $table->double('nilai');
            $table->date('tahun_mulai');
            $table->date('tahun_selesai');
            $table->string('lokasi');
            $table->text('deskripsi')->nullable();
            $table->text('aktivitas_dan_kegiatan_sosial')->nullable();
            $table->string('ijazah');
            $table->char('nik');
            $table->foreign('nik')->references('nik')->on('data_pencari_kerjas')->onDelete('cascade');
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
        Schema::dropIfExists('pendidikans');
    }
}
