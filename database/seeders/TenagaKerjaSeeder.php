<?php

namespace Database\Seeders;

use App\Models\Jabatan;
use App\Models\TenagaKerja;
use App\Models\User;
use Illuminate\Database\Seeder;
use Faker\Factory;

class TenagaKerjaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        $users = User::role('pemberi kerja')->pluck('id')->toArray();
        foreach (array_keys($users, '1') as $key) {
            unset($users[$key]);
        }

        $jabatan = Jabatan::pluck('id');
        
        for ($i = 0; $i < 8; $i++) {
            // echo $faker->numerify('################'),"\n";
            TenagaKerja::create([
                'nik' =>  $faker->numerify('################'),
                'tempat_lahir' => $faker->city(),
                'nama_lengkap' => $faker->name(),
                'id_jabatan ' => $faker->randomElement($jabatan),
                'pendidikan' => $faker->$faker->randomElement(['SD','SLTP','SMA','SMK','D1','D2','D3','D4','S1','S2','S3']),
                'status_pekerja' => $faker->randomElement(['PKWTT','PKWT']),
                'jenis_kelamin' => $faker->randomElement(['Laki-laki','Perempuan']),
                'tgl_lahir' => $faker->date(),
                'bekerja' => $faker->randomElement(['Bekerja','Belum Bekerja']),
                'disabilitas' => $faker->$faker->randomElement(['Disabilitas','Tidak Disabilitas']),
                'tgl_diterima' => $faker->date(),
                'alamat' => $faker->address(),
                'id_users' => $faker->unique->randomElement($users, rand(1, 3)),
            ]);
        }
    }
}
