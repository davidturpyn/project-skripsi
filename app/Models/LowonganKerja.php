<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LowonganKerja extends Model
{
    use HasFactory;

    protected $table = "lowongan_kerjas";

    // protected $fillable = [
    //     'judul_pekerjaan',
    //     'deskripsi_pekerjaan',
    //     'alamat',
    //     'tipe_pekerjaan',
    //     'jenis_pekerjaan',
    //     'is_disabilitas',
    //     'is_non_disabilitas',
    //     'is_laki_laki',
    //     'is_perempuan',
    //     'disabilitas_tidak_boleh',
    //     'rentang_gaji_awal',
    //     'rentang_gaji_akhir',
    //     'is_tampilkan_gaji',
    //     'tanggal_tayang',
    //     'tanggal_expired',
    //     'kuota',
    //     'minimal_pendidikan',
    //     'is_belum_menikah',
    //     'is_sudah_menikah',
    //     'minimal_pengalaman_bekerja',
    //     'minimal_usia',
    //     'maksimal_usia',
    //     'persyaratan_khusus',
    //     'kontak',
    //     'id_jabatan',
    //     'id_bidang_pekerjaan',
    // ];

    protected $dates = ['tanggal_tayang', 'tanggal_expired'];

    protected $guarded = ['id'];

    public function data_pemberi_kerja()
    {
        return $this->belongsTo(DataPemberiKerja::class, 'id_data_pemberi_kerja', 'id');
    }
    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class, 'id_jabatan', 'id');
    }
    public function provinsi()
    {
        return $this->belongsTo(Province::class, 'provinsi_id', 'id');
    }
    public function kabupaten()
    {
        return $this->belongsTo(Regency::class, 'kabupaten_id', 'id');
    }
    public function kecamatan()
    {
        return $this->belongsTo(District::class, 'kecamatan_id', 'id');
    }
    public function kelurahan()
    {
        return $this->belongsTo(Village::class, 'kelurahan_id', 'id');
    }
    public function bidang_pekerjaan()
    {
        return $this->hasMany(BidangPekerjaan::class, 'id_bidang_pekerjaan', 'id');
    }
    public function kontaks()
    {
        return $this->hasMany(Kontak::class, 'id_lowongan_kerja', 'id');
    }
    public function jadwal_interviews()
    {
        return $this->hasMany(JadwalInterview::class, 'id_lowongan_kerja', 'id');
    }
    public function disabilitas()
    {
        return $this->belongsToMany(MacamDisabilitas::class, 'disabilitas', 'id_lowongan_kerja', 'id_macam_disabilitas');
    }
    public function keahlians()
    {
        return $this->belongsToMany(MacamKeahlian::class, 'keahlians', 'id_lowongan_kerja', 'id_keahlian');
    }
}
