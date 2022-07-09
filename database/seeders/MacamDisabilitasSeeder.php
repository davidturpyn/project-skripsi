<?php

namespace Database\Seeders;

use App\Models\MacamDisabilitas;
use Illuminate\Database\Seeder;

class MacamDisabilitasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MacamDisabilitas::create(
            [
                'nama' => 'Tuna Daksa'
            ]
        );
        MacamDisabilitas::create(
            [
                'nama' => 'Tuna Grahita'
            ]
        );
        MacamDisabilitas::create(
            [
                'nama' => 'Tuna Wicara'
            ]
        );
        MacamDisabilitas::create(
            [
                'nama' => 'Tuna Netra'
            ]
        );
        MacamDisabilitas::create(
            [
                'nama' => 'Tuna Rungu'
            ]
        );
        MacamDisabilitas::create(
            [
                'nama' => 'Tuna Ganda'
            ]
        );
    }
}
