<?php

namespace Database\Seeders;

use App\Models\Divisi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DivisiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'nama_divisi' => "Deputi",
                'kepala_divisi' => 'Elen Setiadi, S.H., M.SE',
            ],
            [
                'nama_divisi' => "Asisten Deputi Minyak dan Gas, Pertambangan, dan Petrokimia",
                'kepala_divisi' => 'Herry Permana',
            ],
        ];

        Divisi::insert($data);
    }
}
