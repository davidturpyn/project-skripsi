<?php

namespace Database\Seeders;

use App\Models\Kontak;
use App\Models\LowonganKerja;
use Faker\Factory;
use Illuminate\Database\Seeder;

class KontakLowonganKerjaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create('id_ID');
        $lowongan_kerjas = LowonganKerja::pluck('id');
        // var_dump($lowongan_kerjas);
        for ($i = 0; $i < 20; $i++) {
            // echo "['".$faker->companyEmail()."','".$faker->phoneNumber()."']", "\n";
            Kontak::create([
                'nama' => $faker->companyEmail(),
                'id_lowongan_kerja' => $faker->randomElement($lowongan_kerjas, rand(1, 3)),
            ]);
        }
    }
}
