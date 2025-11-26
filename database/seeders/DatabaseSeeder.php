<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call([
            RoleSeeder::class,
            AdminUserSeeder::class,
            InstrumentSeeder::class,
            CourseSeeder::class,
        ]);

        $clientRole = \App\Models\Role::where('name', 'client')->first();
        User::factory(3)->create([
            'role_id' => $clientRole->id,
        ]); // Create some dummy users
    }
}
