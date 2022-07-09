<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BidangPekerjaan extends Model
{
    use HasFactory;

    protected $table = "bidang_pekerjaans";
    protected $guarded = [];

    public function lowongan_kerja(){
        return $this->belongsTo(LowonganKerja::class,'id_bidang_pekerjaan','id');
    }
}
