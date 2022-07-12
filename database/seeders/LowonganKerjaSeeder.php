<?php

namespace Database\Seeders;

use App\Models\BidangPekerjaan;
use App\Models\DataPemberiKerja;
use App\Models\Jabatan;
use App\Models\JenisIndustri;
use App\Models\LowonganKerja;
use App\Models\User;
use App\Models\Village;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;

class LowonganKerjaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create('id_ID');

        $villages = Village::pluck('id');
        $jabatans = Jabatan::pluck('id');
        $bidang_pekerjaans = BidangPekerjaan::pluck('id');
        $jenis_industris = JenisIndustri::pluck('id');
        $data_pemberi_kerjas = DataPemberiKerja::pluck('id');
        for ($i = 0; $i < 20; $i++) {
            // echo $faker->numberBetween(1500000,4000000), "\n";
            LowonganKerja::create([
                'judul_pekerjaan' => $faker->jobTitle,
                'deskripsi_pekerjaan' => $faker->paragraph,
                'kelurahan_id' => $faker->randomElement($villages, rand(1,3)),
                'nama_jalan' => $faker->address,
                'tipe_pekerjaan' => $faker->randomElement(['Dalam Negeri', 'Luar Negeri']),
                'jenis_pekerjaan' => $faker->randomElement(['Full Time','Part Time','Contract','Freelance','Remote','Intership']),
                'is_disabilitas' => $faker->numberBetween(0,1),
                'is_non_disabilitas' => $faker->numberBetween(0,1),
                'is_laki_laki' => $faker->numberBetween(0,1),
                'is_perempuan' => $faker->numberBetween(0,1),
                'rentang_gaji_awal' => $faker->numberBetween(1500000,4000000),
                'rentang_gaji_akhir' => $faker->numberBetween(4500000,8000000),
                'tanggal_tayang' => $faker->date(),
                'tanggal_expired' => $faker->date(),
                'kuota' => $faker->randomDigitNot(0),
                'minimal_pendidikan' => $faker->randomElement(['SMK','Diploma','Sarjana','Magister','Doktoral','Profesi','SD atau Sederajat','SMP atau Sederajat','SMA atau Sederajat']),
                'is_belum_menikah' => $faker->numberBetween(0,1),
                'is_sudah_menikah' => $faker->numberBetween(0,1),
                'minimal_pengalaman_bekerja' => $faker->randomElement(['Freshgraduate','Kurang Dari 1 Tahun','1 Sampai 4 Tahun','4 Sampai 7 Tahun','7 Sampai 10 Tahun','10 Tahun Lebih']),
                'minimal_usia' => $faker->numberBetween(17,30),
                'maksimal_usia' => $faker->numberBetween(31,40),
                'persyaratan_khusus' => $faker->paragraph(),
                'id_jabatan' =>  $faker->randomElement($jabatans, rand(1,3)),
                'id_bidang_pekerjaan' =>  $faker->randomElement($bidang_pekerjaans, rand(1,3)),
                'id_jenis_industri' =>  $faker->randomElement($jenis_industris, rand(1,3)),
                'id_data_pemberi_kerja' =>  $faker->randomElement($data_pemberi_kerjas, rand(1,3)),
            ]);
        }
    }
}
