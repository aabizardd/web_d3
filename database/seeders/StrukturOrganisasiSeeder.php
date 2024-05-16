<?php

namespace Database\Seeders;

use App\Models\StrukturOrganisasi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StrukturOrganisasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'asdep' => 0,
            ], [
                'asdep' => 1,
            ], [
                'asdep' => 2,
            ], [
                'asdep' => 3,
            ], [
                'asdep' => 4,
            ], [
                'asdep' => 5,
            ],
            // Add more data as needed
        ];

        StrukturOrganisasi::insert($data);
    }
}
