<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keahlian extends Model
{
    protected $table = "keahlians";

    protected $guarded = [];
    use HasFactory;
    public function keahlian()
    {
        return $this->hasMany(LowonganKerja::class, 'keahlians', 'id_lowongan_kerja', 'id_macam_keahlian');
    }
    public function macam_keahlian()
    {
        return $this->hasMany(MacamKeahlian::class, 'keahlians', 'id_lowongan_kerja', 'id_macam_keahlian');
    }
}
