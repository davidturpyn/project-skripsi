<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TenagaKerja extends Model
{
    use HasFactory;

    protected $table = "tenaga_kerjas";

    protected $guarded = [];

    public function users(){
        return $this->belongsTo(User::class);
    }
    public function jabatan(){
        return $this->belongsTo(Jabatan::class, 'id_jabatan', 'id');
    }
}
