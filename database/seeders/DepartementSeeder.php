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
            [
                'directorate_id' => '1',
                'name' => 'HRGA',
                'created_at' => date(now()),
                'updated_at' =>  date(now())

            ],
            [
                'directorate_id' => '1',
                'name' => 'Finance, Accounting dan Tax',
                'created_at' => date(now()),
                'updated_at' =>  date(now())

            ],
              [
                'directorate_id' => '1',
                'name' => 'Etic dan Compliance',
                'created_at' => date(now()),
                'updated_at' =>  date(now())

            ],
            [
                'directorate_id' => '2',
                'name' => 'Non Departemen',
                'created_at' => date(now()),
                'updated_at' =>  date(now())

            ],
            [
                'directorate_id' => '3',
                'name' => 'HSSE',
                'created_at' => date(now()),
                'updated_at' =>  date(now())

            ],
            [
                'directorate_id' => '3',
                'name' => 'Logistik dan Sarpras',
                'created_at' => date(now()),
                'updated_at' =>  date(now())

            ],
            [
                'directorate_id' => '3',
                'name' => 'Pembinaan Hutan dan Biodiversity',
                'created_at' => date(now()),
                'updated_at' =>  date(now())

            ],
            [
                'directorate_id' => '3',
                'name' => 'PMDH',
                'created_at' => date(now()),
                'updated_at' =>  date(now())

            ],
            [
                'directorate_id' => '3',
                'name' => 'Pengamanan dan Perlindungan Hutan',
                'created_at' => date(now()),
                'updated_at' =>  date(now())

            ],
            [
                'directorate_id' => '4',
                'name' => 'Penelitian dan Pengembangan (RnD)',
                'created_at' => date(now()),
                'updated_at' =>  date(now())

            ],
            [
                'directorate_id' => '4',
                'name' => 'Perencanaan dan Database',
                'created_at' => date(now()),
                'updated_at' =>  date(now())

            ],
            [
                'directorate_id' => '4',
                'name' => 'RS-GIS',
                'created_at' => date(now()),
                'updated_at' =>  date(now())

            ],

        ];
        Departement::insert($dep);
    }
}
