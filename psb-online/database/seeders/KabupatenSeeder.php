<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Kabupaten;

class KabupatenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kabupatens = [
            ['name' => 'Bandung', 'provinsi_id' => 1],
            ['name' => 'Bekasi', 'provinsi_id' => 1],
            ['name' => 'Surabaya', 'provinsi_id' => 2],
            // Tambahkan data kabupaten lainnya
        ];

        foreach ($kabupatens as $kabupaten) {
            Kabupaten::create($kabupaten);
        }
    }
}
