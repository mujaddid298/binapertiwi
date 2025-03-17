<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'nama' => 'John Doe',
                'email' => 'john@example.com',
                'alamat' => '123 Main St',
                'role' => 'bc',
                'level' => 1,
                'jabatan' => 'Manager',
                'password' => bcrypt('password123'),
                'no_hp' => '08123456789',
                'cabang' => 'Cabang A',
            ],
            [
                'nama' => 'Jane Smith',
                'email' => 'jane@example.com',
                'alamat' => '456 Elm St',
                'role' => 'komite',
                'level' => 2,
                'jabatan' => 'Staff',
                'password' => bcrypt('password456'),
                'no_hp' => '08987654321',
                'cabang' => 'Cabang B',
            ],
            [
                'nama' => 'Admin User',
                'email' => 'admin@example.com',
                'alamat' => '789 Admin St',
                'role' => 'admin',
                'level' => 3,
                'jabatan' => 'Administrator',
                'password' => bcrypt('password'),
                'no_hp' => '08123456790',
                'cabang' => 'Cabang C',
            ],
        ]);
    }
} 