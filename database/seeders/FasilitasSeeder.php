<?php

namespace Database\Seeders;

// database/seeders/FasilitasSeeder.php
use Illuminate\Database\Seeder;
use App\Models\Fasilitas; // Import model

class FasilitasSeeder extends Seeder
{
    public function run(): void
    {
        Fasilitas::create(['nama_fasilitas' => 'Ruang Lab Multimedia']);
        Fasilitas::create(['nama_fasilitas' => 'Ruang Lab Jarkom']);
        Fasilitas::create(['nama_fasilitas' => 'Ruang Lab Aplikasi']);
        Fasilitas::create(['nama_fasilitas' => 'Ruang Kelas A 3.1']);
        Fasilitas::create(['nama_fasilitas' => 'Ruang Kelas A 3.2']);
        Fasilitas::create(['nama_fasilitas' => 'Ruang Kelas A 3.3']);
        Fasilitas::create(['nama_fasilitas' => 'Ruang Kelas A 3.4']);
        Fasilitas::create(['nama_fasilitas' => 'Ruang Kelas A 3.5']);
        Fasilitas::create(['nama_fasilitas' => 'Ruang BBA']);
        Fasilitas::create(['nama_fasilitas' => 'Ruang Dosen']);
        Fasilitas::create(['nama_fasilitas' => 'Ruang Prodi']);
        Fasilitas::create(['nama_fasilitas' => 'Ruang Perpustakaan']);
        Fasilitas::create(['nama_fasilitas' => 'Tempat Parkir']);
        Fasilitas::create(['nama_fasilitas' => 'Kantin']);
        Fasilitas::create(['nama_fasilitas' => 'Koneksi Jaringan Wifi']);
        Fasilitas::create(['nama_fasilitas' => 'Lingkungan Kampus']);
        Fasilitas::create(['nama_fasilitas' => 'Toilet Umum']);
        Fasilitas::create(['nama_fasilitas' => 'Mushola']);
        Fasilitas::create(['nama_fasilitas' => 'Bangunan Gedung']);
    }
}
