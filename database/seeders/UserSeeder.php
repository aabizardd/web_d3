<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'PIC Asdep 1',
                'email' => 'asdep1@gmail.com',
                'password' => Hash::make('asdasd'),
                'role' => 2,
                'asdep' => 1

            ],
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('asdasd'),
                'role' => 1,
                'asdep' => null
            ],
            // Add more users as needed
        ];

        User::insert($users);
    }
}