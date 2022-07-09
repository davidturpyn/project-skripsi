<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKeahlianPencariKerjaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keahlian_pencari_kerjas', function (Blueprint $table) {
            $table->char('nik_keahlian_pencari_kerja');
            $table->foreign('nik_keahlian_pencari_kerja')->references('nik')->on('data_pencari_kerjas')->onDelete('cascade');
            $table->unsignedBigInteger('id_keahlian_pencari_kerja');
            $table->foreign('id_keahlian_pencari_kerja')->references('id')->on('macam_keahlians')->onDelete('cascade');
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
        Schema::dropIfExists('keahlian_pencari_kerjas');
    }
}
