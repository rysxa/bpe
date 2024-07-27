<?php

namespace Database\Seeders;

use App\Models\Products;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Products::create([
            'name' => 'P3K',
            'capital_price' => 2500,
            'deposit_price' => 6000,
            'sales_price' => 15000,
            'icon' => 'medkit',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Products::create([
            'name' => 'Painkiller',
            'capital_price' => 15000,
            'deposit_price' => 17000,
            'sales_price' => 25000,
            'icon' => 'hourglass-half',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Products::create([
            'name' => 'Sodium',
            'capital_price' => 0,
            'deposit_price' => 0,
            'sales_price' => 0,
            'icon' => 'blind',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Products::create([
            'name' => 'Batadine',
            'capital_price' => 8500,
            'deposit_price' => 13000,
            'sales_price' => 20000,
            'icon' => 'eyedropper',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Products::create([
            'name' => 'Heparin',
            'capital_price' => 8500,
            'deposit_price' => 13000,
            'sales_price' => 15000,
            'icon' => 'flask',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Products::create([
            'name' => 'Antasida',
            'capital_price' => 0,
            'deposit_price' => 0,
            'sales_price' => 0,
            'icon' => 'envira',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Products::create([
            'name' => 'Perban',
            'capital_price' => 30000,
            'deposit_price' => 33000,
            'sales_price' => 40000,
            'icon' => 'thermometer-empty',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Products::create([
            'name' => 'Zat Besi',
            'capital_price' => 12500,
            'deposit_price' => 15000,
            'sales_price' => 20000,
            'icon' => 'stethoscope',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
