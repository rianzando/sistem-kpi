<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $Role = [
            'name' => 'Superadmin',
            'created_at' => date(now()),
            'updated_at' =>  date(now())
        ];
        Role::insert($Role);
    }
}
