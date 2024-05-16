<?php

namespace Database\Seeders;

use App\Models\ProfilDeputi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProfilDeputiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'foto' => null,
                'isi' => null

            ],

            // Add more data as needed
        ];

        ProfilDeputi::insert($data);
    }
}
