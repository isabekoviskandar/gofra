<?php

namespace Database\Seeders;

use App\Models\Group;
use App\Models\Permission;
use App\Models\Role;
use App\Models\Section;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Role::create([
            'name' => 'admin',
        ]);
        Role::create([
            'name' => 'accountant',
        ]);
        Role::create([
            'name' => 'cashier',
        ]);
        Role::create([
            'name' => 'manufacturer',
        ]);
        Role::create([
            'name' => 'hr',
        ]);
        Role::create([
            'name' => 'logistics manager',
        ]);
        Role::create([
            'name' => 'warehouse manager',
        ]);
        Role::create([
            'name' => 'sales manager',
        ]);

        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make(123456789),
            'role_id' => 1
        ]);

        Section::create([
            'name' => 'Bugalteriya',
        ]);
        Section::create([
            'name' => 'Kassa',
        ]);
        Section::create([
            'name' => 'Hr',
        ]);
        Section::create([
            'name' => 'Ishlab chiqarish',
        ]);
        Section::create([
            'name' => 'Menejment',
        ]);
        Section::create([
            'name' => 'Boshqaruv',
        ]);
    }
}
