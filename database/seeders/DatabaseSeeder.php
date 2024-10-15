<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Kontak;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UserSeeder::class);
        $this->call(ProfilDeputiSeeder::class);
        $this->call(StrukturOrganisasiSeeder::class);
        $this->call(FolderSeeder::class);
        $this->call(KontakSeeder::class);
        $this->call(DivisiSeeder::class);
    }
}
