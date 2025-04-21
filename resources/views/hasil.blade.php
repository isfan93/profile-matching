@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Hasil Rekomendasi Jurusan</h1>
    
    <div class="card mb-4">
        <div class="card-header">
            <h3>Urutan Rekomendasi Jurusan</h3>
        </div>
        
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Peringkat</th>
                            <th>Jurusan</th>
                            <th>Kecocokan</th>
                            <th>Deskripsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($results as $index => $result)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td><strong>{{ $result['jurusan']->nama }}</strong></td>
                            <td>{{ number_format($result['score'] * 20, 2) }}%</td>
                            <td>{{ $result['jurusan']->deskripsi }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    <a href="{{ route('hasil-rekomendasi') }}" class="btn btn-secondary">
        Lanjut
    </a>
</div>
@endsection