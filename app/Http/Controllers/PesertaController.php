<?php

namespace App\Http\Controllers;

use App\Models\KelaSiswa;
use App\Models\User;
use App\Models\Kuota;
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
public function pendaftaran($beasiswaId) 
{
    $user = Auth::user();
    $kriteria = Kriteria::all();
    $subkriteria = Subkriteria::all();

    // ambil kelas user
    $kelaSiswa = KelaSiswa::where('user_id', $user->id)->first();
    if (!$kelaSiswa) {
        return redirect()->back()->with('error', 'Data kelas Anda belum tersedia.');
    }

    $userKelasId = $kelaSiswa->kelas_id;

    // ambil info beasiswa & kelas user, tetap tampilkan form meski kuota belum ada
    $beasiswa = Beasiswa::find($beasiswaId);
    $kelas = Kelas::find($userKelasId);

    // ambil data siswa
    $siswa = DataSiswa::where('id_user', $user->id)->first();

    return view('admin.layout.pendaftaran', compact('kriteria', 'subkriteria', 'beasiswa', 'kelas', 'siswa'));
}

public function storePendaftaran(Request $request, $beasiswaId)
{
    $user = Auth::user();

    // ambil kelas user
    $kelaSiswa = KelaSiswa::where('user_id', $user->id)->first();
    if (!$kelaSiswa) {
        return redirect()->back()->with('error', 'Data kelas Anda belum tersedia.');
    }
    $userKelasId = $kelaSiswa->kelas_id;

    // ambil kuota untuk kelas user
    $kuota = Kuota::where('id_beasiswa', $beasiswaId)
                  ->where('id_kelas', $userKelasId)
                  ->first();

    // cek user sudah daftar atau belum
    $cek = Peserta::where('id_siswa', $user->id)
                  ->where('id_beasiswa', $beasiswaId)
                  ->first();

    if ($cek) {
        return redirect()->back()->with('error', 'Anda sudah mendaftar beasiswa ini.');
    }

    // cek kuota tersisa
    if ($kuota) {
        $jumlahPeserta = Peserta::where('id_beasiswa', $beasiswaId)
                                ->where('id_kelas', $userKelasId)
                                ->count();

        if ($jumlahPeserta >= $kuota->kuota) {
            return redirect()->back()->with('error', 'Kuota untuk kelas Anda sudah penuh.');
        }
    }

    // handle upload file
    $sktmPath = $request->file('sktm') ? $request->file('sktm')->store('uploads/sktm', 'public') : null;
    $docLainnyaPath = $request->file('dok_lainnya') ? $request->file('dok_lainnya')->store('uploads/dokumen', 'public') : null;

    // simpan data peserta
    Peserta::create([
        'id_siswa'    => $user->id,
        'id_beasiswa' => $beasiswaId,
        'id_kelas'    => $userKelasId,
        'penghasilan' => $request->penghasilan,
        'tanggungan'  => $request->tanggungan,
        'pekerjaan'   => $request->pekerjaan,
        'asset'       => $request->asset,
        'sktm'        => $sktmPath,
        'dok_lainnya' => $docLainnyaPath,
        'status'      => 'Mendaftar',
    ]);

    return redirect('/peserta')->with('success', 'Pendaftaran berhasil, data Anda sedang diproses.');
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
