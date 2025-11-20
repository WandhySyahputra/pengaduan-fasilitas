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
            'nama' => 'Mahasiswa',
            'email' => 'user@gmail.com',
            'password' => Hash::make('password'),
            'no_telp' => '081234567890',
            'alamat' => 'Jl. Mawar No. 1, Desa Tirtomoyo',
            'role' => 'warga',
        ]);

        User::create([
            'nama' => 'Admin Kampus',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
            'no_telp' => '089876543210',
            'alamat' => 'Kampus Stimata',
            'role' => 'admin',
        ]);
    }
}
