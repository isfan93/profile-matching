<?php
namespace Database\Seeders;
use App\Models\Jurusan;
use App\Models\MataPelajaran;
use Illuminate\Database\Seeder;

class JurusanMataPelajaranSeeder extends Seeder
{
    public function run()
    {
        // Mata Pelajaran
        $matematika = MataPelajaran::create(['nama' => 'Matematika']);
        $fisika = MataPelajaran::create(['nama' => 'Fisika']);
        $kimia = MataPelajaran::create(['nama' => 'Kimia']);
        $biologi = MataPelajaran::create(['nama' => 'Biologi']);
        $bahasaInggris = MataPelajaran::create(['nama' => 'Bahasa Inggris']);

        // Jurusan
        $tkj = Jurusan::create([
            'nama' => 'TKJ',
            'deskripsi' => 'Jurusan TKJ cocok untuk siswa yang kuat di bidang sains dan matematika.'
        ]);
        
        $tsm = Jurusan::create([
            'nama' => 'TSM',
            'deskripsi' => 'Jurusan TSM cocok untuk siswa yang lebih tertarik pada ilmu sosial dan humaniora.'
        ]);
        
        $farmasi = Jurusan::create([
            'nama' => 'FARMASI',
            'deskripsi' => 'Jurusan FARMASI cocok untuk siswa yang memiliki minat kuat dalam bahasa dan sastra.'
        ]);

        $keperawatan = Jurusan::create([
            'nama' => 'KEPERAWATAN',
            'deskripsi' => 'Jurusan KEPERAWATAN cocok untuk siswa yang memiliki minat kuat dalam bahasa dan sains.'
        ]);
        
        // Bobot Mata Pelajaran untuk Jurusan tkj
        $tkj->mataPelajarans()->attach([
            $matematika->id => ['bobot' => 80],
            $fisika->id => ['bobot' => 60],
            $kimia->id => ['bobot' => 50],
            $biologi->id => ['bobot' => 45],
            $bahasaInggris->id => ['bobot' => 85]
        ]);
        
        // Bobot Mata Pelajaran untuk Jurusan tsm
        $tsm->mataPelajarans()->attach([
            $matematika->id => ['bobot' => 75],
            $fisika->id => ['bobot' => 85],
            $kimia->id => ['bobot' => 50],
            $biologi->id => ['bobot' => 35],
            $bahasaInggris->id => ['bobot' => 55]
        ]);
        
        // Bobot Mata Pelajaran untuk Jurusan farmasi
        $farmasi->mataPelajarans()->attach([
            $matematika->id => ['bobot' => 70],
            $fisika->id => ['bobot' => 45],
            $kimia->id => ['bobot' => 80],
            $biologi->id => ['bobot' => 85],
            $bahasaInggris->id => ['bobot' => 70]
        ]);

        // Bobot Mata Pelajaran untuk Jurusan keperawatan
        $keperawatan->mataPelajarans()->attach([
            $matematika->id => ['bobot' => 60],
            $fisika->id => ['bobot' => 40],
            $kimia->id => ['bobot' => 65],
            $biologi->id => ['bobot' => 85],
            $bahasaInggris->id => ['bobot' => 80]
        ]);
    }
}
