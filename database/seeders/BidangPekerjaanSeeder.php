<?php

namespace Database\Seeders;

use App\Models\BidangPekerjaan;
use Illuminate\Database\Seeder;

class BidangPekerjaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BidangPekerjaan::create(
            [
                'nama' => 'Ahli Ekonomi'
            ]
        );
        BidangPekerjaan::create(
            [
                'nama' => 'Dokter Hewan'
            ]
        );
        BidangPekerjaan::create(
            [
                'nama' => 'IT, Programmer'
            ]
        );
        BidangPekerjaan::create(
            [
                'nama' => 'TI, Systems Analyst'
            ]
        );
        BidangPekerjaan::create(
            [
                'nama' => 'Juru Gambar'
            ]
        );
        BidangPekerjaan::create(
            [
                'nama' => 'Magang'
            ]
        );
        BidangPekerjaan::create(
            [
                'nama' => 'Kepala Sekolah'
            ]
        );
        BidangPekerjaan::create(
            [
                'nama' => 'Editor'
            ]
        );
        BidangPekerjaan::create(
            [
                'nama' => 'Design'
            ]
        );
        BidangPekerjaan::create(
            [
                'nama' => 'Transportasi'
            ]
        );
    }
}
