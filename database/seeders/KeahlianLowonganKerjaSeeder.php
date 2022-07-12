<?php

namespace Database\Seeders;

use App\Models\Keahlian;
use App\Models\LowonganKerja;
use App\Models\MacamKeahlian;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;

class KeahlianLowonganKerjaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create('id_ID');

        $macam_keahlians = MacamKeahlian::pluck('id');
        $lowongan_kerjas = LowonganKerja::pluck('id');
        // var_dump($lowongan_kerjas);
        for ($i = 0; $i < 40; $i++) {
            Keahlian::create([
                'id_lowongan_kerja' => $faker->randomElement($lowongan_kerjas, rand(1, 3)),
                'id_keahlian' => $faker->randomElement($macam_keahlians, rand(1, 3)),
            ]);
        }
    }
}
