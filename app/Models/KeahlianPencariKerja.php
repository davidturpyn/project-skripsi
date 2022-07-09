<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KeahlianPencariKerja extends Model
{

    protected $table = "keahlian_pencari_kerjas";

    protected $guarded = [];
    use HasFactory;
    public function data_pencari_kerja()
    {
        return $this->hasMany(DataPencariKerja::class, 'keahlian_pencari_kerjas', 'nik_keahlian_pencari_kerja', 'id_keahlian_pencari_kerja');
    }
    public function macam_keahlian()
    {
        return $this->hasMany(MacamKeahlian::class, 'keahlian_pencari_kerjas', 'nik_keahlian_pencari_kerja', 'id_keahlian_pencari_kerja');
    }
}
