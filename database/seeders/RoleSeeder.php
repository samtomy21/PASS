<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{

    public function run(): void
    {
        $rolAdmin = Role::create(['name' => 'Admin']);
        $rolEmployee = Role::create(['name' => 'Employee']);

        Permission::create(['name' => 'home'])->syncRoles([$rolAdmin, $rolEmployee]);

        Permission::create(['name' => 'users.index'])->syncRoles([$rolAdmin]);
        Permission::create(['name' => 'users.edit'])->syncRoles([$rolAdmin]);
        Permission::create(['name' => 'users.update'])->syncRoles([$rolAdmin]);

        Permission::create(['name' => 'passes.index'])->syncRoles([$rolAdmin, $rolEmployee]);
        Permission::create(['name' => 'passes.show'])->syncRoles([$rolAdmin, $rolEmployee]);
        Permission::create(['name' => 'passes.create'])->syncRoles([$rolAdmin, $rolEmployee]);
        Permission::create(['name' => 'passes.edit'])->syncRoles([$rolAdmin, $rolEmployee]);
        Permission::create(['name' => 'passes.destroy'])->syncRoles([$rolAdmin, $rolEmployee]);

        Permission::create(['name' => 'charges.index'])->syncRoles([$rolAdmin]);
        Permission::create(['name' => 'charges.create'])->syncRoles([$rolAdmin]);
        Permission::create(['name' => 'charges.edit'])->syncRoles([$rolAdmin]);
        Permission::create(['name' => 'charges.destroy'])->syncRoles([$rolAdmin]);

        Permission::create(['name' => 'dependences.index'])->syncRoles([$rolAdmin]);
        Permission::create(['name' => 'dependences.create'])->syncRoles([$rolAdmin]);
        Permission::create(['name' => 'dependences.edit'])->syncRoles([$rolAdmin]);
        Permission::create(['name' => 'dependences.destroy'])->syncRoles([$rolAdmin]);
    }
}
