<?php

namespace Database\Seeders;

use App\Models\Folder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FolderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'nama_folder' => "Asisten Deputi Minyak dan Gas, Pertambangan, dan Petrokimia / Sekretaris Deputi",
                'user_create' => 2,
                'bg_img' => 'https://gdb.voanews.com/4786AF54-FC68-4FD6-976F-7C702D7B0515_w1023_r1_s.jpg'
            ], [
                'nama_folder' => "Asisten Deputi Agro, Farmasi, dan Pariwisata",
                'user_create' => 2,
                'bg_img' => 'https://www.astra-agro.co.id/wp-content/uploads/2019/02/1a-2019-2-1020x510.jpg'
            ], [
                'nama_folder' => "Asisten Deputi Jasa Keuangan dan Industri Informasi",
                'user_create' => 2,
                'bg_img' => 'https://img.alinea.id/img/content/2019/01/28/26391/industri-jasa-keuangan-belum-kuat-mendorong-pertumbuhan-ekonomi-fsuA2zrKn3.jpg'
            ], [
                'nama_folder' => "Asisten Deputi Utilitas dan Industri Manufaktur",
                'user_create' => 2,
                'bg_img' => 'https://images-tm.tempo.co/all/2023/06/06/833216/833216_1200.jpg'
            ], [
                'nama_folder' => "Asisten Deputi Niaga dan Transportasi",
                'user_create' => 2,
                'bg_img' => 'https://solarindustri.com/wp-content/uploads/2024/03/Kapal-dengan-kontainer.webp'
            ],

        ];

        Folder::insert($data);
    }
}
