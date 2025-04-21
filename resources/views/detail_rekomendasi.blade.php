@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Detail Rekomendasi Siswa {{ $dataSiswa->nama }} Kelas {{ $dataSiswa->kelas }}</h1>
    
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
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($dataSiswa->rekomendasis as $data)
                        
                        <tr>
                            <td>{{ $data->ranking }}</td>
                            <td>{{ $data->jurusan->nama }}</strong></td>
                            <td>{{ $data->score }}%</td>
                            {{-- <td>{{ $result['jurusan']->deskripsi }}</td> --}}
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    <a href="{{ route('hasil-rekomendasi') }}" class="btn btn-secondary">
        Kembali
    </a>
</div>
@endsection