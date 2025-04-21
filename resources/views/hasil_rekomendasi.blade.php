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
                            <th>No</th>
                            <th>Nama</th>
                            <th>Jurusan</th>
                            <th>Skor</th>
                            <th>#</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($hasilRekomendasi as $rekom)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $rekom->siswa->nama }}</td>
                            <td>{{ $rekom->jurusan->nama }}</td>
                            <td>{{ $rekom->score }} %</td>
                            <td>
                                <a href="{{ route('detail-rekomendasi', $rekom->siswa_id) }}" class="btn btn-info btn-sm">
                                    Detail
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    {{-- <a href="{{ route('home') }}" class="btn btn-secondary">
        Kembali ke Form Input
    </a> --}}
</div>
@endsection