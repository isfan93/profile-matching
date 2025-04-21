<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    protected $fillable = ['nama_jurusan','deskripsi'];

    public function mataPelajarans()
    {
        return $this->belongsToMany(MataPelajaran::class)->withPivot('bobot')->withTimestamps();
    }

    public function siswaRekomendasi(){
        return $this->belongsToMany(Siswa::class, 'rekomendasi_jurusan')->withPivot('score', 'rangking')->withTimestamps();
    }
}
