<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUlasanWawancaraPerusahaanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ulasan_wawancara_perusahaan', function (Blueprint $table) {
            $table->id();
            $table->string('perusahaan');
            $table->string('posisi_jabatan');
            $table->string('lokasi');
            $table->string('tipe_pekerjaan');
            $table->string('lama_bekerja');
            $table->boolean('masih_bekerja');
            $table->boolean('is_positif');
            $table->boolean('is_negatif');
            $table->boolean('is_normal');
            $table->text('proses_wawancara');
            $table->text('pertanyaan_materi_wawancara');
            $table->text('respon_anda_saat_wawancara');
            $table->string('tingkat_kesulitan');
            $table->string('hasil_wawancara');
            $table->text('proses_negosiasi_wawancara');
            $table->unsignedBigInteger('id_users');
            $table->foreign('id_users')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('id_data_pemberi_kerja');
            $table->foreign('id_data_pemberi_kerja')->references('id')->on('data_pemberi_kerjas')->onDelete('cascade');
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
        Schema::dropIfExists('ulasan_wawancara_perusahaan');
    }
}
