<?php

namespace Database\Seeders;

use App\Models\Keahlian;
use App\Models\LegalitasPerusahaan;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(JabatanSeeder::class);
        $this->call(MacamKeahlianSeeder::class);
        $this->call(MacamDisabilitasSeeder::class);
        $this->call(JenisIndustriSeeder::class);
        $this->call(BidangPekerjaanSeeder::class);
        $this->call(IndoRegionProvinceSeeder::class);
        $this->call(IndoRegionRegencySeeder::class);
        $this->call(IndoRegionDistrictSeeder::class);
        $this->call(IndoRegionVillageSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(DataPemberiKerjaSeeder::class);
        $this->call(LegalitasPerusahaanSeeder::class);
        $this->call(StatusPerusahaanSeeder::class);
        $this->call(TenagaKerjaSeeder::class);
        $this->call(LowonganKerjaSeeder::class);
    }
}
