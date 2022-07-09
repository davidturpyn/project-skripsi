<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSertifikatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sertifikats', function (Blueprint $table) {
            $table->id();
            $table->string('program_sertifikat');
            $table->string('lembaga_sertifikat');
            $table->double('nilai')->nullable();
            $table->date('tgl_diterbitkan');
            $table->date('tgl_berakhir');
            $table->string('dokumen');
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
        Schema::dropIfExists('sertifikats');
    }
}
