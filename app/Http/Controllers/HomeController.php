<?php

namespace App\Http\Controllers;

use App\Models\KelaSiswa;
use App\Models\Kuota;
use App\Models\User;
use App\Models\Hasil;
use App\Models\Peserta;
use App\Models\Beasiswa;
use App\Models\Kriteria;
use App\Models\DataSiswa;
use App\Models\Subkriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $user = Auth::user()->id;
        $dataSiswa = DataSiswa::where('id_user', $user)->first();
        $peserta = Peserta::where('id_siswa', $user)->first();
        $hasil = Hasil::where('id_siswa', $user)->first();
        $beasiswa = Beasiswa::count();
        $siswa = User::where('role', 'user')->count();
        $kriteria = Kriteria::count();
        $sub = Subkriteria::count();
        $kelas = KelaSiswa::where('user_id', $user)->pluck('kelas_id');
        $data = Kuota::whereIn('id_kelas', $kelas)->get();
        return view('admin.component.dashboard', compact('data', 'peserta', 'siswa', 'beasiswa', 'kriteria', 'sub', 'hasil', 'dataSiswa'));
    }
}
