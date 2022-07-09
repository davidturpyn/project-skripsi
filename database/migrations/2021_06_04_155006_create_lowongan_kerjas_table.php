<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLowonganKerjasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lowongan_kerjas', function (Blueprint $table) {
            $table->id();
            $table->string('judul_pekerjaan');
            $table->text('deskripsi_pekerjaan');
            $table->char('provinsi_id', 2);
            $table->foreign('provinsi_id')->references('id')->on('provinces');
            $table->char('kabupaten_id',4);
            $table->foreign('kabupaten_id')->references('id')->on('regencies');
            $table->char('kecamatan_id',7);
            $table->foreign('kecamatan_id')->references('id')->on('districts');
            $table->char('kelurahan_id',10);
            $table->foreign('kelurahan_id')->references('id')->on('villages');
            $table->string('nama_jalan');
            $table->enum('tipe_pekerjaan',['Dalam Negeri', 'Luar Negeri']);
            $table->enum('jenis_pekerjaan', ['Full Time','Part Time','Contract','Freelance','Remote', 'Intership']);
            $table->boolean('is_disabilitas')->nullable();
            $table->boolean('is_non_disabilitas')->nullable();
            $table->boolean('is_laki_laki')->nullable();
            $table->boolean('is_perempuan')->nullable();
            $table->string('rentang_gaji_awal');
            $table->string('rentang_gaji_akhir');
            $table->date('tanggal_tayang');
            $table->date('tanggal_expired');
            $table->integer('kuota');
            $table->enum('minimal_pendidikan', ['SMK', 'Diploma', 'Sarjana', 'Magister', 'Doktoral', 'Profesi', 'SD atau Sederajat', 'SMP atau Sederajat', 'SMA atau Sederajat']);
            $table->boolean('is_belum_menikah')->nullable();
            $table->boolean('is_sudah_menikah')->nullable();
            $table->enum('minimal_pengalaman_bekerja', ['Freshgraduate', 'Kurang Dari 1 Tahun', '1 Sampai 4 Tahun','4 Sampai 7 Tahun','7 Sampai 10 Tahun','10 Tahun Lebih']);
            $table->integer('minimal_usia');
            $table->integer('maksimal_usia');
            $table->text('persyaratan_khusus');
            $table->unsignedBigInteger('id_jabatan');
            $table->foreign('id_jabatan')->references('id')->on('jabatans')->onDelete('cascade');
            $table->unsignedBigInteger('id_bidang_pekerjaan');
            $table->foreign('id_bidang_pekerjaan')->references('id')->on('bidang_pekerjaans')->onDelete('cascade');
            $table->unsignedBigInteger('id_jenis_industri');
            $table->foreign('id_jenis_industri')->references('id')->on('jenis_industris')->onDelete('cascade');
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
        Schema::dropIfExists('lowongan_kerjas');
    }
}
