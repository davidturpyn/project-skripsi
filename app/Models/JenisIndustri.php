<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisIndustri extends Model
{
    use HasFactory;

    protected $table = "jenis_industris";

    protected $guarded = [];

    public function data_pemberi_kerja(){
        return $this->hasMany(DataPemberiKerja::class, 'id_jenis_industri','id');
    }
}
