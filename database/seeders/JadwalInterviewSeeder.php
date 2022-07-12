<?php

namespace Database\Seeders;

use App\Models\JadwalInterview;
use App\Models\LowonganKerja;
use Faker\Factory;
use Illuminate\Database\Seeder;

class JadwalInterviewSeeder extends Seeder
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
            JadwalInterview::create([
                'nama_interview' => $faker->jobTitle(),
                'tanggal_interview' => $faker->date(),
                'alamat_interview' => $faker->address(),
                'keterangan' => $faker->paragraph,
                'id_lowongan_kerja' => $faker->randomElement($lowongan_kerjas, rand(1, 3)),
            ]);
        }
    }
}
