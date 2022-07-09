<?php

namespace Database\Seeders;

use App\Models\Jabatan;
use Illuminate\Database\Seeder;

class JabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Jabatan::create(
            [
                'nama' => 'Camat'
            ]
        );
        Jabatan::create(
            [
                'nama' => 'Guru Sekolah Dasar'
            ]
        );
        Jabatan::create(
            [
                'nama' => 'Dosen Ilmu Matematika'
            ]
        );
        Jabatan::create(
            [
                'nama' => 'Direktur Utama'
            ]
        );
        Jabatan::create(
            [
                'nama' => 'Analis Programmer'
            ]
        );
        Jabatan::create(
            [
                'nama' => 'Juru Kamera Video'
            ]
        );
        Jabatan::create(
            [
                'nama' => 'Chef'
            ]
        );
        Jabatan::create(
            [
                'nama' => 'Jaksa Agung'
            ]
        );
        Jabatan::create(
            [
                'nama' => 'Pimpinan Organisasi Bidang Khusus Lainnya'
            ]
        );
        Jabatan::create(
            [
                'nama' => 'Chief Executive Officer/Direktur Eksekutif'
            ]
        );
    }
}
