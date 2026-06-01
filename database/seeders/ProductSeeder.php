<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'name' => 'Hot Wheels 1968 Camaro',
                'price' => 85000,
                'stock' => 10,
                'image' => 'camaro.jpeg',
                'created_at' => now(),
            ],
            [
                'name' => 'Hot Wheels Twin Mill',
                'price' => 95000,
                'stock' => 8,
                'image' => 'twinmill.jpeg',
                'created_at' => now(),
            ],
            [
                'name' => 'Hot Wheels Bone Shaker',
                'price' => 99000,
                'stock' => 12,
                'image' => 'boneshaker.jpeg',
                'created_at' => now(),
            ],
            [
                'name' => 'Hot Wheels Rodger Dodger',
                'price' => 79000,
                'stock' => 15,
                'image' => 'rodger.jpeg',
                'created_at' => now(),
            ],
            [
                'name' => 'Hot Wheels Deora II',
                'price' => 89000,
                'stock' => 7,
                'image' => 'deora2.jpeg',
                'created_at' => now(),
            ],
        ]);
    }
}