<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use App\Models\MataPelajaran;
use App\Models\NilaiSiswa;
use App\Models\Rekomendasi;
use App\Models\Siswa;
use Illuminate\Http\Request;

class JurusanController extends Controller
{
    public function index()
    {
        $mataPelajarans = MataPelajaran::all();
        return view('form', compact('mataPelajarans'));
    }
    
    public function rekomendasi(Request $request)
    {
        // Validasi input
        $request->validate([
            'nilai.*' => 'required|numeric|min:0|max:100',
            'nama' => 'required|string|max:255',
            'kelas' => 'required|string|max:255',
        ]);

        // simpan data siswa
        $siswa = Siswa::create([
            'nama' => $request->nama,
            'kelas' => $request->kelas
        ]);
        
        // Simpan nilai siswa dengan menghubunkgna ke siswa yang baru dibuat
        foreach ($request->nilai as $mataPelajaranId => $nilai) {
            NilaiSiswa::updateOrCreate(
                [
                    'siswa_id' => $siswa->id,
                    'mata_pelajaran_id' => $mataPelajaranId
                ],
                [
                    // 'siswa_id' => $siswa->id,
                    // 'mata_pelajaran_id' => $mataPelajaranId,
                    'nilai' => $nilai
                ]
                // ['mata_pelajaran_id' => $mataPelajaranId], // Kondisi pencarian
                // ['mata_pelajaran_id' => $mataPelajaranId, 'nilai' => $nilai] // Data yang akan diupdate/dibuat
            );
        }
        
        // Proses Profile Matching
        $jurusans = Jurusan::with('mataPelajarans')->get();
        $nilaiSiswas = NilaiSiswa::with('mataPelajaran')->where('siswa_id',$siswa->id)->get();
        // $namaSiswas = Siswa::with('siswa_id')->get();
        
        $results = [];
        
        foreach ($jurusans as $jurusan) {
            $total = 0;
            $totalBobot = 0;
            
            foreach ($jurusan->mataPelajarans as $mataPelajaran) {
                $nilaiSiswa = $nilaiSiswas->where('mata_pelajaran_id', $mataPelajaran->id)->first();
                
                if ($nilaiSiswa) {
                    $gap = $nilaiSiswa->nilai - $mataPelajaran->pivot->bobot;
                    $total += $this->convertGapToScore($gap);
                    $totalBobot += $mataPelajaran->pivot->bobot;
                }
            }
            
            if ($totalBobot > 0) {
                $results[] = [
                    'jurusan' => $jurusan,
                    'score' => $total / $totalBobot
                ];
            }
        }
        
        // Urutkan berdasarkan score tertinggi
        usort($results, function ($a, $b) {
            return $b['score'] <=> $a['score'];
        });

        $this->simpanRekomendasi($results, $siswa->id);
        
        return view('hasil', compact('results','siswa'));
    }
    
    private function convertGapToScore($gap)
    {
        // Konversi gap ke nilai berdasarkan tabel profile matching
        // Anda bisa menyesuaikan ini sesuai kebutuhan
        if ($gap == 0) return 5;
        if (abs($gap) == 1) return 4;
        if (abs($gap) == 2) return 3;
        if (abs($gap) == 3) return 2;
        return 1;
    }

    private function simpanRekomendasi($results, $siswaId){
        foreach ($results as $index => $result){
            Rekomendasi::create([
                'siswa_id' => $siswaId,
                'jurusan_id' => $result['jurusan']->id,
                'score' => $result['score'] * 20,
                'ranking' => $index + 1
            ]);
        }
    }


    public function hasilRekomendasi(){
        $no = 1;
        $hasilRekomendasi = Rekomendasi::where('ranking',1)->get();
        return view('hasil_rekomendasi',compact('no','hasilRekomendasi'));
    }

    public function detailRekomendasi($siswa_id){
        $no = 1;
        $dataSiswa = Siswa::with(['rekomendasis' => function($query){
            $query->orderBy('ranking','asc')->with('jurusan');
        }])->findOrFail($siswa_id);
        return view('detail_rekomendasi',compact('no','dataSiswa'));
    }
}
