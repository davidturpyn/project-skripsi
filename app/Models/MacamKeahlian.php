<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MacamKeahlian extends Model
{
    protected $fillable = ['id','nama'];
    protected $table = "macam_keahlians";

    protected $guarded = [];
    use HasFactory;

    public function keahlian()
    {
        return $this->belongsToMany(Keahlian::class, 'keahlians', 'id_lowongan_kerja', 'id_macam_keahlian');
    }
    public function keahlian_pencari_kerja()
    {
        return $this->belongsToMany(KeahlianPencariKerja::class,'keahlian_pencari_kerjas', 'nik_keahlian_pencari_kerja', 'id_keahlian_pencari_kerja');
    }
}
