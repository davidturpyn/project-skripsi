<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataPencariKerjasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_pencari_kerjas', function (Blueprint $table) {
            $table->char('nik',16)->primary();
            $table->string('tempat_lahir');
            $table->date('tgl_lahir');
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
            $table->enum('agama', ['Islam', 'Kristen', 'Katolik', 'Buddha', 'Hindu']);
            $table->enum('status', ['Lajang', 'Telah Menikah', 'Duda', 'Janda']);
            $table->text('deskripsi_profil');
            $table->string('alamat_sesuai_ktp');
            $table->char('provinsi_id', 2);
            $table->foreign('provinsi_id')->references('id')->on('provinces');
            $table->char('kabupaten_id',4);
            $table->foreign('kabupaten_id')->references('id')->on('regencies');
            $table->char('kecamatan_id',7);
            $table->foreign('kecamatan_id')->references('id')->on('districts');
            $table->char('kelurahan_id',10);
            $table->foreign('kelurahan_id')->references('id')->on('villages');
            $table->string('kode_pos_dom');
            $table->string('alamat_dom');
            $table->enum('status_bekerja', ['Belum Bekerja', 'Sudah Bekerja']);
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
        Schema::dropIfExists('data_pencari_kerjas');
    }
}
