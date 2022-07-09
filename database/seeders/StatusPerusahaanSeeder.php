<?php

namespace Database\Seeders;

use App\Models\StatusPerusahaan;
use App\Models\User;
use Illuminate\Database\Seeder;

class StatusPerusahaanSeeder extends Seeder
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
        $faker = \Faker\Factory::create();
        for ($i = 0; $i < 8; $i++) {
            // echo $faker->randomElement(['PMDN','Swasta Nasional','PMA','Joint Venture']), "\n";
            StatusPerusahaan::create([
                'status_kepemilikan' => $faker->randomElement(['Swasta','Persero','Perum','Perusahaan Daerah','Yayasan','Koperasi','Perseorangan','Patungan']),
                'status_pemodal' => $faker->randomElement(['PMDN','Swasta Nasional','PMA','Joint Venture']),
                'negara' => $faker->state,
                'id_users' => $faker->unique->randomElement($users, rand(1,3)),
            ]);
        }
    }
}
