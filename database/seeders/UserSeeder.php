<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $user = [
            'name' => 'Superadmin',
            'password' => bcrypt('password'),
            'email' => 'feriansyah@ptmpk.com',
            'status' => 'active',
            'role_id' => '1',
        ];
        user::insert($user);
    }
}
