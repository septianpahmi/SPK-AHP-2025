<?php

namespace App\Http\Controllers;

use auth;
use App\Models\User;
use App\Models\Kelas;
use App\Models\Peserta;
use App\Models\Beasiswa;
use App\Models\Kriteria;
use App\Models\DataSiswa;
use App\Models\Comparisons;
use App\Models\Subkriteria;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class PesertaController extends Controller
{
    public function index()
    {
        $data = Peserta::all();
        return view('admin.component.peserta', compact('data'));
    }
    public function pendaftaran($id)
    {
        $user = auth()->user()->id;
        $kriteria = Kriteria::all();
        $subkriteria = Subkriteria::all();
        $beasiswa = Beasiswa::find($id);
        $kelas = Kelas::all();
        $siswa = DataSiswa::where('id_user', $user)->first();
        return view('admin.layout.pendaftaran', compact('kriteria', 'subkriteria', 'beasiswa', 'kelas', 'siswa'));
    }

    public function approve($id)
    {
        $data = Peserta::find($id);
        $data->update(['status' => 'Diproses']);
        $data->save();

        if ($data->status == 'Diproses') {
            Comparisons::create([
                'id_siswa' => $data->id_siswa,
                'id_beasiswa' => $data->id_beasiswa,
                'id_peserta' => $id,
                'penghasilan' => $data->penghasilan,
                'pekerjaan' => $data->pekerjaan,
                'tanggungan' => $data->tanggungan,
                'asset' => $data->asset
            ]);
        }
        return redirect('/peserta')->with('success', 'Peserta berhasil distujui');
    }

    public function disapprove($id)
    {
        $data = Peserta::find($id);
        $data->update(['status' => 'Ditolak']);
        $data->save();
        return redirect('/peserta')->with('success', 'Peserta berhasil ditolak');
    }

    public function delete($id)
    {
        $data = Peserta::find($id);
        Comparisons::where('id_peserta', $id);
        if ($data) {
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
