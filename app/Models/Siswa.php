<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $fillable = ['nama', 'kelas'];

    public function nilaiSiswa(){
        return $this->hasMany(NilaiSiswa::class);
    }

    public function rekomendasis()
    {
        return $this->hasMany(Rekomendasi::class)->orderBy('ranking');
    }
}
