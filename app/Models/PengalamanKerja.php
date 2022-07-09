<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengalamanKerja extends Model
{
    use HasFactory;

    protected $table = "pengalaman_kerjas";

    protected $guarded = [];
    
    public function data_pencari_kerja(){
        return $this->belongsTo(DataPencariKerja::class);
    }
}
