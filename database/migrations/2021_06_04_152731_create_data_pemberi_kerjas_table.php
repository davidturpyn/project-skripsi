<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataPemberiKerjasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_pemberi_kerjas', function (Blueprint $table) {
            $table->id();
            $table->string('nama_perusahaan');
            $table->date('tgl_berdiri');
            $table->integer('jumlah_cabang_dalam_negeri');
            $table->integer('jumlah_cabang_luar_negeri');
            $table->text('tentang_perusahaan');
            $table->string('email_perusahaan');
            $table->string('website_perusahaan')->nullable();
            $table->string('url_banner')->nullable();
            // $table->char('provinsi_id', 2);
            // $table->foreign('provinsi_id')->references('id')->on('provinces');
            // $table->char('kabupaten_id',4);
            // $table->foreign('kabupaten_id')->references('id')->on('regencies');
            // $table->char('kecamatan_id',7);
            // $table->foreign('kecamatan_id')->references('id')->on('districts');
            $table->char('kelurahan_id',10);
            $table->foreign('kelurahan_id')->references('id')->on('villages');
            $table->string('nama_jalan');
            $table->unsignedBigInteger('id_jenis_industri');
            $table->foreign('id_jenis_industri')->references('id')->on('jenis_industris')->onDelete('cascade');
            $table->unsignedBigInteger('id_users');
            $table->foreign('id_users')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('data_pemberi_kerjas');
    }
}
