<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendidikan extends Model
{
    use HasFactory;

    protected $table = "pendidikans";

    protected $guarded = [];
    
    public function data_pencari_kerja(){
        return $this->belongsTo(DataPencariKerja::class);
    }
}
