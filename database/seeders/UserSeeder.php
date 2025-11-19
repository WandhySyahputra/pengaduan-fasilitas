<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        User::create([
            'nama' => 'Warga Tirtomoyo',
            'email' => 'user@example.com',
            'password' => Hash::make('password'),
            'no_telp' => '081234567890',
            'alamat' => 'Jl. Mawar No. 1, Desa Tirtomoyo',
            'role' => 'warga',
        ]);

        User::create([
            'nama' => 'Admin Desa',
            'email' => '9876543210987654',
            'password' => Hash::make('adminpassword'),
            'no_telp' => '089876543210',
            'alamat' => 'Kantor Desa Tirtomoyo',
            'role' => 'admin',
        ]);
    }
}
