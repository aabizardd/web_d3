<?php

namespace Database\Seeders;

use App\Models\Kontak;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KontakSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'nama' => "Muhammad Abizard",
                'email' => 'm.abizard1123@gmail.com',
                'no_hp' => '081386397855',
                'asal_kantor' => 'Kemenko Ekon',
                'divisi' => 'Deputi 3',
                'jabatan' => 'Staf',
            ],
        ];

        Kontak::insert($data);
    }
}
