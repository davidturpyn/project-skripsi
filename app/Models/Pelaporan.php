<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelaporan extends Model
{
    use HasFactory;

    protected $table = "pelaporans";

    protected $guarded = [];

    public function data_pemberi_kerja(){
        return $this->belongsTo(DataPemberiKerja::class);
    }
}
