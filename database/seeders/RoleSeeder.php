<?php

namespace Database\Seeders;

use App\Models\Roles;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Roles::create([
            'name' => 'Administrator',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Roles::create([
            'name' => 'Owner',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Roles::create([
            'name' => 'Manager',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Roles::create([
            'name' => 'Doctor',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Roles::create([
            'name' => 'Intern',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
