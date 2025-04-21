<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rekomendasi extends Model
{
    protected $fillable = ['siswa_id', 'jurusan_id', 'score', 'ranking'];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }
    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class);
    }
}
