<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MacamDisabilitas extends Model
{
    protected $fillable = ['id','nama'];
    protected $table = "macam_disabilitas";
    protected $guarded = [];
    
    use HasFactory;

    public function disabilitas()
    {
        return $this->belongsToMany(Disabilitas::class, 'PIVOT', 'id_macam_disabilitas', 'id_lowongan_kerja' );
    }
}
