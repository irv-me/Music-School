<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Role::create(['name' => 'admin', 'description' => 'Administrator']);
        \App\Models\Role::create(['name' => 'staff', 'description' => 'Staff Member']);
        \App\Models\Role::create(['name' => 'client', 'description' => 'Student/Client']);
    }
}
