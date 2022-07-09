<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disabilitas extends Model
{
    protected $table = "disabilitas";

    protected $guarded = [];
    use HasFactory;

    public function disabilitas()
    {
        return $this->hasMany(LowonganKerja::class, 'disabilitas', 'id_macam_disabilitas', 'id_lowongan_kerja');
    }
    public function macam_disabilitas()
    {
        return $this->hasMany(MacamDisabilitas::class, 'disabilitas', 'id_macam_disabilitas', 'id_lowongan_kerja');
    }
}
