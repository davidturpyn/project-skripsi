<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kontak extends Model
{
    protected $table = "kontaks";

    protected $guarded = [];
    use HasFactory;

    public function lowongan_kerja() {
        return $this->belongsTo(LowonganKerja::class, 'id_lowongan_kerja', 'id');
    }
}
