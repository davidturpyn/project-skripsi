<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalInterview extends Model
{
    use HasFactory;
    protected $table = "jadwal_interviews";

    protected $guarded = [];

    public function lowongan_kerja(){
        return $this->belongsTo(LowonganKerja::class, 'id_lowongan_kerja', 'id');
    }
}
