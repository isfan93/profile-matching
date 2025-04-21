<?php

namespace Database\Seeders;

use App\Models\MataPelajaran;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MataPelajaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $matematika = MataPelajaran::create(['nama' => 'Matematika']);
        $fisika = MataPelajaran::create(['nama' => 'Fisika']);
        $kimia = MataPelajaran::create(['nama' => 'Kimia']);
        $biologi = MataPelajaran::create(['nama' => 'Biologi']);
        $bahasaInggris = MataPelajaran::create(['nama' => 'Bahasa Inggris']);
        $bahasaIndonesia = MataPelajaran::create(['nama' => 'Bahasa Indonesia']);
        $sejarah = MataPelajaran::create(['nama' => 'Sejarah']);
        $ekonomi = MataPelajaran::create(['nama' => 'Ekonomi']);
        $geografi = MataPelajaran::create(['nama' => 'Geografi']);
        $sosiologi = MataPelajaran::create(['nama' => 'Sosiologi']);


        
    }
}
