<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Provinsi;

class ProvinsiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $provinsis = ['Jawa Barat', 'Jawa Timur', 'Jawa Tengah', 'DKI Jakarta', 'Banten'];

        foreach ($provinsis as $provinsi) {
            Provinsi::create(['name' => $provinsi]);
        }
    }
}
