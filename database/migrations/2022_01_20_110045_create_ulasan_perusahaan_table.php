<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUlasanPerusahaanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ulasan_perusahaan', function (Blueprint $table) {
            $table->id();
            $table->string('perusahaan');
            $table->string('posisi_jabatan');
            $table->string('lokasi');
            $table->string('lama_bekerja');
            $table->text('kelebihan_perusahaan');
            $table->text('kekurangan_perusahaan');
            $table->integer('gaji_tunjangan');
            $table->integer('jenjang_karir');
            $table->integer('work_balance');
            $table->integer('nilai_budaya');
            $table->integer('manajemen_senior');
            $table->boolean('masih_bekerja');
            $table->unsignedBigInteger('id_users');
            $table->foreign('id_users')->references('id')->on('users');
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
        Schema::dropIfExists('ulasan_perusahaan');
    }
}
