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
            'name' => 'Zat Besi',
            'capital_price' => 2500,
            'deposit_price' => 6000,
            'sales_price' => 15000,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Products::create([
            'name' => 'Painkiller',
            'capital_price' => 15000,
            'deposit_price' => 16000,
            'sales_price' => 35000,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
