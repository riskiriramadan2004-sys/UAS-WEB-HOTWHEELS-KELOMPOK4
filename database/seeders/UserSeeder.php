<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->updateOrInsert(
            ['username' => 'admin'],
            [
                'password' => md5('admin123'),
                'role' => 'admin',
                'created_at' => now(),
            ]
        );

        DB::table('users')->updateOrInsert(
            ['username' => 'user1'],
            [
                'password' => md5('user123'),
                'role' => 'user',
                'created_at' => now(),
            ]
        );
    }
}