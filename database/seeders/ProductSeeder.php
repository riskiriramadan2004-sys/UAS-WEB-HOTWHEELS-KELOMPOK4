<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('orders')->delete();
        DB::table('products')->delete();

        DB::table('products')->insert([
            ['name' => '1968 Camaro', 'price' => 85000, 'stock' => 10, 'image' => '1968 Camaro.jpeg', 'created_at' => now()],
            ['name' => 'Bone Shaker', 'price' => 99000, 'stock' => 12, 'image' => 'Bone Shaker.jpeg', 'created_at' => now()],
            ['name' => 'Deora II', 'price' => 89000, 'stock' => 7, 'image' => 'Deora II.jpeg', 'created_at' => now()],
            ['name' => 'Fast Fish', 'price' => 78000, 'stock' => 9, 'image' => 'Fast Fish.jpeg', 'created_at' => now()],
            ['name' => 'GT Scorcher', 'price' => 95000, 'stock' => 8, 'image' => 'GT Scorcher.jpeg', 'created_at' => now()],
            ['name' => 'HW50 Concept', 'price' => 110000, 'stock' => 6, 'image' => 'HW50 Concept.jpeg', 'created_at' => now()],
            ['name' => 'Rip Rod', 'price' => 87000, 'stock' => 11, 'image' => 'Rip Rod.jpeg', 'created_at' => now()],
            ['name' => 'Rodger Dodger', 'price' => 79000, 'stock' => 15, 'image' => 'Rodger Dodger.jpeg', 'created_at' => now()],
            ['name' => 'Time Attaxi', 'price' => 82000, 'stock' => 10, 'image' => 'Time Attaxi.jpeg', 'created_at' => now()],
            ['name' => 'Twin Mill', 'price' => 95000, 'stock' => 8, 'image' => 'Twin Mill.jpeg', 'created_at' => now()],
        ]);
    }
}