<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@bpe.com',
            'password' => Hash::make('PlmQaz012'),
            'role_id' => 1,
            'status' => 1
        ]);

        User::create([
            'name' => 'Owner',
            'email' => 'owner@bpe.com',
            'password' => Hash::make('PlmQaz012'),
            'role_id' => 2,
            'status' => 1
        ]);

        User::create([
            'name' => 'Manager',
            'email' => 'manager@bpe.com',
            'password' => Hash::make('PlmQaz012'),
            'role_id' => 3,
            'status' => 1
        ]);

        User::create([
            'name' => 'Doctor',
            'email' => 'doctor@bpe.com',
            'password' => Hash::make('PlmQaz012'),
            'role_id' => 3,
            'status' => 1
        ]);
    }
}
