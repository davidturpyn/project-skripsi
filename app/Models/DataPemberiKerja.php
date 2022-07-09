<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPemberiKerja extends Model
{
    use HasFactory;

    protected $table = "data_pemberi_kerjas";

    protected $guarded = [];

    public function users()
    {
        return $this->belongsTo(User::class, 'id_users' , 'id');
    }
    public function jenis_industri()
    {
        return $this->belongsTo(JenisIndustri::class, 'id_jenis_industri', 'id');
    }
    public function provinsi()
    {
        return $this->belongsTo(Province::class, 'provinsi_id', 'id');
    }
    public function regencies()
    {
        return $this->belongsTo(Regency::class, 'kabupaten_id', 'id');
    }
    public function lowongan_kerja()
    {
        return $this->hasMany(LowonganKerja::class, 'id_data_pemberi_kerja', 'id');
    }
    public function pelaporan()
    {
        return $this->hasMany(Pelaporan::class);
    }
}
