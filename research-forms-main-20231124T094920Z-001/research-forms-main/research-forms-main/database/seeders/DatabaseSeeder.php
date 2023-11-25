<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        $this->call([
            RoleSeeder::class,
            ResearchFormSeeder::class,
            DepartmentSeeder::class,
            CourseSeeder::class,
        ]);

        $user = \App\Models\User::create([
            'first_name' => 'SMCC',
            'last_name' => 'Administrator',
            'username' => 'admin',
            'password' => Hash::make('admin'),
        ]);

        $user->assignRole('admin');
    }
}
