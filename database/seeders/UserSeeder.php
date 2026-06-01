<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'username' => 'admin',
                'password' => md5('admin123'),
                'role' => 'admin',
                'created_at' => now(),
            ],
            [
                'username' => 'user1',
                'password' => md5('user123'),
                'role' => 'user',
                'created_at' => now(),
            ],
        ]);
    }
}