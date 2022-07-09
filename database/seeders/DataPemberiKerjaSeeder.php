<?php

namespace Database\Seeders;

use App\Models\DataPemberiKerja;
use App\Models\JenisIndustri;
use App\Models\Province;
use App\Models\Regency;
use App\Models\User;
use App\Models\Village;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;
use Spatie\Permission\Models\Role;

class DataPemberiKerjaSeeder extends Seeder
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
        $jenis_indusris = JenisIndustri::pluck('id');
        $villages = Village::pluck('id');

        $faker = \Faker\Factory::create();
        for ($i = 0; $i < 8; $i++) {
            
            // echo $faker->unique->randomElement($users), "\n";
            DataPemberiKerja::create([
                'nama_perusahaan' => $faker->company,
                'tgl_berdiri' => $faker->date,
                'jumlah_cabang_dalam_negeri' => $faker->randomDigit,
                'jumlah_cabang_luar_negeri' => $faker->randomDigit,
                'tentang_perusahaan' => $faker->paragraph,
                'email_perusahaan' => $faker->companyEmail,
                'website_perusahaan' => $faker->domainName,
                'url_banner' => $faker->imageUrl,
                'kelurahan_id' => $faker->randomElement($villages, rand(1,3)),
                'nama_jalan' => $faker->address(),
                'id_jenis_industri' =>  $faker->randomElement($jenis_indusris, rand(1,3)),
                'id_users' => $faker->unique->randomElement($users, rand(1,3)),
            ]);
        }
    }
}
