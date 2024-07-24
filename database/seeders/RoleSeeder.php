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
            'name' => 'Administrator'
        ]);

        Roles::create([
            'name' => 'Owner'
        ]);

        Roles::create([
            'name' => 'Manager'
        ]);

        Roles::create([
            'name' => 'Doctor'
        ]);

        Roles::create([
            'name' => 'Intern'
        ]);
    }
}
