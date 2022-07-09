<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatusPerusahaansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('status_perusahaans', function (Blueprint $table) {
            $table->id();
            $table->enum('status_kepemilikan',
            [
                'Swasta',
                'Persero',
                'Perum',
                'Perusahaan Daerah',
                'Yayasan',
                'Koperasi',
                'Perseorangan',
                'Patungan',
            ]);
            $table->enum('status_pemodal',
            [
                'PMDN',
                'Swasta Nasional',
                'PMA',
                'Joint Venture',
            ]);
            $table->string('negara');
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
        Schema::dropIfExists('status_perusahaans');
    }
}
