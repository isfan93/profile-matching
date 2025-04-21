@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Pemilihan Jurusan dengan Profile Matching</h1>
    
    <form action="{{ route('rekomendasi') }}" method="POST">
        @csrf
        
        <div class="card">
            <div class="card-header">
                <h3>Masukkan Data Siswa</h3>
            </div>
            
            <div class="card-body">
                
                <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">
                        Nama Siswa
                    </label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="nama" name="nama" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">
                        Kelas
                    </label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="kelas" name="kelas" required>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h3>Masukkan Nilai Mata Pelajaran</h3>
            </div>
            
            <div class="card-body">
                @foreach($mataPelajarans as $mapel)
                <div class="form-group row">
                    <label for="nilai_{{ $mapel->id }}" class="col-sm-4 col-form-label">
                        {{ $mapel->nama }}
                    </label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" 
                               id="nilai_{{ $mapel->id }}" 
                               name="nilai[{{ $mapel->id }}]" 
                               min="0" max="100" required>
                    </div>
                </div>
                @endforeach
            </div>
            
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">
                    Cari Rekomendasi Jurusan
                </button>
            </div>
        </div>
    </form>
</div>
@endsection