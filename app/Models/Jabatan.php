<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    use HasFactory;

    protected $table = "jabatans";

    protected $guarded = [];

    public function tenaga_kerja(){
        return $this->hasMany(TenagaKerja::class, 'id_jabatan', 'id');
    }
    public function lowongan_kerja(){
        return $this->hasMany(LowonganKerja::class, 'id_jabatan', 'id');
    }
}
