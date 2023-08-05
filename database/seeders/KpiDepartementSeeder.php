<?php

namespace Database\Seeders;

use App\Models\kpiDepartement;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KpiDepartementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 100; $i++) {
            DB::table('kpi_departements')->insert([
                'kpi_directorate_id' => rand(1, 21),
                'departement_id' => rand(1, 12),
                'framework' => 'Framework ' . $i,
                'kpi_departement' => 'KPI Departement ' . $i,
                'target_departement' =>'Target Departement ' . $i,
                'year' => '2023',
                'start_date' => date(now()),
                'end_date' => date(now()),
                'achievement' => '0',
                'status' => 'Open',
                'user_id' => '1',
                'updated' => '1',

            ]);
        }
    }
}