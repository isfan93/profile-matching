<?php

namespace App\Http\Controllers;

use App\Models\hasilRekomendasi;
use App\Models\Rekomendasi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(Request $request)
    {   
        // pencarian data siswa hasil rekomendasi

        if($request->has('search')){
            $hasilRekomendasi = hasilRekomendasi::where('nama_siswa', 'like', '%'.$request->search.'%')->get();
        } else {
            $hasilRekomendasi = hasilRekomendasi::all();
        }
        $no=1;
        // $hasilRekomendasi = Rekomendasi::where('ranking',1)->get();
        return view('login.index', compact('no','hasilRekomendasi'));
        
    }

    public function loginProses(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $data = [
            'username' => $request->username,
            'password' => $request->password
        ];

        if(Auth::attempt($data)){
            return redirect()->route('home')->with('success', 'Login Berhasil');
        }else{
            return redirect()->route('login')->with('error', 'Login Gagal');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Logout Berhasil');
    }

    public function hasilRekomendasi()
    {
        
    }

}
