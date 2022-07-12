<?php

namespace Database\Seeders;

use App\Models\LegalitasPerusahaan;
use App\Models\User;
use Illuminate\Database\Seeder;

class LegalitasPerusahaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::role('pemberi kerja')->pluck('id')->toArray();
        foreach (array_keys($users, '1') as $key) {
            unset($users[$key]);
        }
        $faker = \Faker\Factory::create('id_ID');
        for ($i = 0; $i < 8; $i++) {
            // echo $faker->numerify('#############'), "\n";
            LegalitasPerusahaan::create([
                'no_perizinan' => $faker->numerify('#############'),
                'no_tdp' => $faker->numerify('#############'),
                'npwp_perusahaan' => $faker->numerify('###############'),
                'no_akta_perusahaan' => $faker->numerify('#############'),
                'nama_pemilik' => $faker->firstName(),
                'alamat_pemilik' => $faker->address(),
                'nama_pengurus' => $faker->firstName(),
                'alamat_pengurus' => $faker->address(),
                'id_users' => $faker->unique->randomElement($users, rand(1,3)),
            ]);
        }
    }
}
