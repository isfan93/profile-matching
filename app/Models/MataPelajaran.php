<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MataPelajaran extends Model
{
    protected $fillable =['nama'];

    public function jurusans()
    {
        return $this->belongsToMany(Jurusan::class)->withPivot('bobot');
    }

    public function nilaiSiswas()
    {
        return $this->hasMany(NilaiSiswa::class);
    }
}
