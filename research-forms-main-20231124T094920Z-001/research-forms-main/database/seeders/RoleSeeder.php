<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roleNames = ['admin', 'student', 'adviser', 'librarian'];

        foreach ($roleNames as $roleName) {
            Role::create(['name' => $roleName]);
        }
    }
}
