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
            'name' => 'Perencanaan dan Database',
            'created_at' => date(now()),
            'updated_at' =>  date(now())
        ];
        Directorate::insert($dir);
    }
}
