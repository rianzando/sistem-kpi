<?php

namespace Database\Seeders;

use App\Models\Departement;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dep = [
            'directorate_id' => '1',
            'name' => 'IT-Database',
            'created_at' => date(now()),
            'updated_at' =>  date(now())
        ];
        Departement::insert($dep);
    }
}
