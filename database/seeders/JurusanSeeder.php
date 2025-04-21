<?php

namespace Database\Seeders;

use App\Models\Jurusan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JurusanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ipa = Jurusan::create([
            'nama' => 'IPA',
            'deskripsi' => 'Jurusan IPA cocok untuk siswa yang kuat di bidang sains dan matematika.'
        ]);
        
        $ips = Jurusan::create([
            'nama' => 'IPS',
            'deskripsi' => 'Jurusan IPS cocok untuk siswa yang lebih tertarik pada ilmu sosial dan humaniora.'
        ]);
        
        $bahasa = Jurusan::create([
            'nama' => 'Bahasa',
            'deskripsi' => 'Jurusan Bahasa cocok untuk siswa yang memiliki minat kuat dalam bahasa dan sastra.'
        ]);

        
    }
}
