<?php

namespace Database\Seeders;

use App\Models\MacamKeahlian;
use Illuminate\Database\Seeder;

class MacamKeahlianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MacamKeahlian::create(
            [
                'nama' => 'C#'
            ]
        );
        MacamKeahlian::create(
            [
                'nama' => 'Cooking'
            ]
        );
        MacamKeahlian::create(
            [
                'nama' => 'Digital Marketing'
            ]
        );
        MacamKeahlian::create(
            [
                'nama' => 'Content Marketing'
            ]
        );
        MacamKeahlian::create(
            [
                'nama' => 'Latte Art'
            ]
        );
        MacamKeahlian::create(
            [
                'nama' => 'Adobe Premiere'
            ]
        );
        MacamKeahlian::create(
            [
                'nama' => 'Interface Design'
            ]
        );
        MacamKeahlian::create(
            [
                'nama' => 'Angular JS'
            ]
        );
        MacamKeahlian::create(
            [
                'nama' => 'Microsoft Excel'
            ]
        );
        MacamKeahlian::create(
            [
                'nama' => 'Microsoft Office'
            ]
        );
    }
}
