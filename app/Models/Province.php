<?php

/*
 * This file is part of the IndoRegion package.
 *
 * (c) Azis Hapidin <azishapidin.com | azishapidin@gmail.com>
 *
 */

namespace App\Models;

use AzisHapidin\IndoRegion\Traits\ProvinceTrait;
use Illuminate\Database\Eloquent\Model;

/**
 * Province Model.
 */
class Province extends Model
{
    use ProvinceTrait;
    use \Staudenmeir\EloquentHasManyDeep\HasRelationships;
    /**
     * Table name.
     *
     * @var string
     */
    protected $table = 'provinces';

    /**
     * Province has many regencies.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function regencies()
    {
        return $this->hasMany(Regency::class, 'province_id', 'id');
    }
    public function districts()
    {
        return $this->hasManyThrough(District::class, Regency::class);
    }
    public function data_pemberi_kerja(){
        return $this->hasMany(DataPemberiKerja::class, 'provinsi_id','id');
    }
    public function data_pencari_kerja(){
        return $this->hasMany(DataPencariKerja::class, 'provinsi_id','id');
    }
    public function lowongan_kerja(){
        return $this->hasMany(LowonganKerja::class, 'provinsi_id','id');
    }
    public function villages(){
        return $this->hasManyDeep(Village::class, [Regency::class, District::class]);
    }
}
