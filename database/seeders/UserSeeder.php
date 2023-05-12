<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;

class UserSeeder extends Seeder
{

    public function run(): void
    {
        User::create([
            'name' => 'Yury Brayan Huaquilla Torres',
            'email' => 'yury@hotmail.com',
            'ncard' => '0001',
            'password' => bcrypt('password'),
        ])->assignRole('Admin');

        User::create([
            'name' => 'Brad Tyler Sanchez Mamani',
            'email' => 'brad@hotmail.com',
            'ncard' => '0002',
            'password' => bcrypt('password'),
        ])->assignRole('Admin');

        User::create([
            'name' => 'Marcos Deniss Choque Castro',
            'email' => 'deniss@hotmail.com',
            'ncard' => '0003',
            'password' => bcrypt('password'),
        ])->assignRole('Employee');

        User::create([
            'name' => 'Milton Jarata Quispe',
            'email' => 'Milton@hotmail.com',
            'ncard' => '0004',
            'password' => bcrypt('password'),
        ])->assignRole('Employee');

    }
}
