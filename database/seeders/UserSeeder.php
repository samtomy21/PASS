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
            'ncard' => '00001',
            'name_charge' => 'gobernador',
            'name_dependence' => 'gobernacion',
            'password' => bcrypt('password'),
        ])->assignRole('Admin');

        User::factory(9)->create();
    }
}
