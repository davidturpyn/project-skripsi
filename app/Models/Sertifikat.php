<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sertifikat extends Model
{
    use HasFactory;

    protected $table = "sertifikats";

    protected $guarded = [];
    
    public function data_pencari_kerja(){
        return $this->belongsTo(DataPencariKerja::class);
    }
}
