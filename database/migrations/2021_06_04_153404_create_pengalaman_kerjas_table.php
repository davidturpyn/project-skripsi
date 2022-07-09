<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengalamanKerjasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengalaman_kerjas', function (Blueprint $table) {
            $table->id();
            $table->string('pekerjaan');
            $table->string('perusahaan');
            $table->string('tipe_pekerjaan');
            $table->string('lokasi');
            $table->date('dari_tanggal');
            $table->date('sampai_tanggal')->nullable();
            $table->text('deskripsi')->nullable();
            $table->string('dokumen_riwayat_kerja');
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
        Schema::dropIfExists('pengalaman_kerjas');
    }
}
