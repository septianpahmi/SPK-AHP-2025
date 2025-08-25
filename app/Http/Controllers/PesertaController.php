<?php

namespace App\Http\Controllers;

use App\Models\KelaSiswa;
use App\Models\User;
use App\Models\Kelas;
use App\Models\Peserta;
use App\Models\Beasiswa;
use App\Models\Kriteria;
use App\Models\DataSiswa;
use App\Models\Comparisons;
use App\Models\Subkriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PesertaController extends Controller
{
    public function index()
    {
        $data = Peserta::all();
        return view('admin.component.peserta', compact('data'));
    }

    public function pendaftaran($id)
    {
        $user = Auth::user(); // ambil user login
        $kriteria = Kriteria::all();
        $subkriteria = Subkriteria::all();
        $beasiswa = Beasiswa::find($id);
        $kelaSiswa = KelaSiswa::where('user_id', $user->id)->first();
        $kelas = Kelas::where('id', $kelaSiswa->kelas_id)->first();
        $siswa = DataSiswa::where('id_user', $user->id)->first();

        return view('admin.layout.pendaftaran', compact('kriteria', 'subkriteria', 'beasiswa', 'kelas', 'siswa'));
    }

    public function storePendaftaran(Request $request, $id)
    {
        $user = Auth::user();
        $kelas = KelaSiswa::where('user_id', $user->id)->first();

        // validasi supaya 1 user tidak bisa daftar beasiswa yang sama 2x
        $cek = Peserta::where('id_siswa', $user->id)
                      ->where('id_beasiswa', $id)
                      ->first();

        if ($cek) {
            return redirect()->back()->with('error', 'Anda sudah mendaftar beasiswa ini.');
        }

        // simpan data peserta (nis tetap diambil dari tabel user, bukan dari request)
        Peserta::create([
            'id_siswa'   => $user->id,
            'id_beasiswa'=> $id,
            'id_kelas'   => $kelas->kelas_id,
            'penghasilan'=> $request->penghasilan,
            'tanggungan' => $request->tanggungan,
            'pekerjaan'  => $request->pekerjaan,
            'asset'      => $request->asset,
            'sktm'       => $request->sktm,
            'dok_lainnya'=> $request->dok_lainnya,
            'status'     => 'Mendaftar',
        ]);

        return redirect('/peserta')->with('success', 'Pendaftaran berhasil, data anda sedang diproses.');
    }

    public function approve($id)
    {
        $data = Peserta::find($id);
        $data->update(['status' => 'Diproses']);

        if ($data->status == 'Diproses') {
            Comparisons::create([
                'id_siswa'   => $data->id_siswa,
                'id_beasiswa'=> $data->id_beasiswa,
                'id_peserta' => $id,
                'penghasilan'=> $data->penghasilan,
                'pekerjaan'  => $data->pekerjaan,
                'tanggungan' => $data->tanggungan,
                'asset'      => $data->asset
            ]);
        }
        return redirect('/peserta')->with('success', 'Peserta berhasil disetujui');
    }

    public function disapprove($id)
    {
        $data = Peserta::find($id);
        $data->update(['status' => 'Ditolak']);
        return redirect('/peserta')->with('success', 'Peserta berhasil ditolak');
    }

    public function delete($id)
    {
        $data = Peserta::find($id);
        if ($data) {
            Comparisons::where('id_peserta', $id)->delete();
            $data->delete();
        }
        return redirect('/peserta')->with('success', 'Peserta berhasil dihapus');
    }

    public function detail($id)
    {
        $data = Peserta::find($id);
        $siswa = DataSiswa::where('id_user', $data->id_siswa)->first();

        if (!$siswa) {
            return redirect()->back()->with('error', 'Data tidak ditemukan, mohon lengkapi data siswa terlebih dahulu');
        }
        return view('admin.layout.detail-peserta', compact('data', 'siswa'));
    }
}
