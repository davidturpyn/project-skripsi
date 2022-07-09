<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPencariKerja extends Model
{
    use HasFactory;

    protected $table = "data_pencari_kerjas";
    protected $primaryKey = 'nik';

    protected $guarded = [
        // 'nik',
        // 'tempat_lahir',
        // 'tgl_lahir',
        // 'jenis_kelamin',
        // 'agama',
        // 'status',
        // 'deskripsi_profil',
        // 'alamat_sesuai_ktp',
        // 'provinsi_id ',
        // 'kabupaten_id ',
        // 'kecamatan_id ',
        // 'kelurahan_id ',
        // 'kode_pos_dom',
        // 'alamat_dom',
        // 'status_bekerja',
        // 'id_users',
    ];

    protected $casts = [
        'nik' => 'string'
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'id_users', 'id');
    }
    public function pendidikan()
    {
        return $this->hasMany(Pendidikan::class);
    }
    public function sertifikat()
    {
        return $this->hasMany(Sertifikat::class);
    }
    public function pengalaman_kerja()
    {
        return $this->hasMany(PengalamanKerja::class);
    }
    public function provinsi()
    {
        return $this->belongsTo(Province::class, 'provinsi_id', 'id');
    }
    public function regencies()
    {
        return $this->belongsTo(Regency::class, 'kabupaten_id', 'id');
    }
    public function keahlian_pencari_kerjas()
    {
        return $this->belongsToMany(MacamKeahlian::class, 'keahlian_pencari_kerjas', 'nik_keahlian_pencari_kerja', 'id_keahlian_pencari_kerja');
    }
}
