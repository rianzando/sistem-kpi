<?php

namespace Database\Seeders;

use App\Models\Directorate;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DirectorateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dir = [
            [

                'name' => 'Administrasi dan Umum',
                'created_at' => date(now()),
                'updated_at' =>  date(now())
            ],
            [

                'name' => 'Non Direktorat',
                'created_at' => date(now()),
                'updated_at' =>  date(now())
            ],
            [

                'name' => 'Operational',
                'created_at' => date(now()),
                'updated_at' =>  date(now())
            ],
            [

                'name' => 'Perencanaan, Penelitian dan Pengembangan',
                'created_at' => date(now()),
                'updated_at' =>  date(now())
            ],
        ];
        Directorate::insert($dir);
    }
}