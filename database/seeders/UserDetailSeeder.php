<?php

namespace Database\Seeders;

use App\Models\UserDetail;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $detailuser = [
            'user_id' => '1',
            'nik' => '1234567890',
            'phone' => '089767571238',
            'domisili' => 'Non-lokal',
            'address' => 'Jl. Pagentongan',
            'directorate_id' => 1,
            'departement_id' => 1,
            'position' => 'Manager',
            'level' => 'Senior',
            'location' => 'Bogor',
            'spk_status' => 'Permanent',
            'first_work_date' => date(now()),
            'end_work_date' =>  date(now()),
            'place_of_birth' => 'Bogor',
            'date_of_birth' =>  date(now()),
            'gender' => 'Laki-laki',
            'education' => 'Bachelor',
            'name_of_place' => 'University',
            'major' => 'Computer Science',
            'image' => 'employee_image.jpg',
        ];

        // Simpan data employee ke dalam database
        UserDetail::create($detailuser);
    }
}