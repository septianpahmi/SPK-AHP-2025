<?php

namespace App\Http\Controllers;

use App\Models\Beasiswa;
use App\Models\Kelas;
use App\Models\Kuota;
use Illuminate\Http\Request;

class KuotaController extends Controller
{
    public function index()
    {
        $data = Kuota::all();
        $beasiswa = Beasiswa::all();
        $kelas = Kelas::all();
        return view('admin.component.kuota', compact('data', 'beasiswa', 'kelas'));
    }

    public function post(Request $request)
    {
        // Validasi input
        $request->validate([
            'id_beasiswa' => 'required|exists:beasiswas,id',
            'id_kelas' => 'required|exists:kelas,id',
            'kuota' => 'required|integer|min:1',
        ], [
            'kuota.min' => 'Kuota minimal harus 1 (tidak boleh 0 atau minus).',
        ]);

        
        $cek = Kuota::where('id_beasiswa', $request->id_beasiswa)
                    ->where('id_kelas', $request->id_kelas)
                    ->first();
        if ($cek) {
            return redirect('/kuota')->with('error', 'Kuota untuk kelas tersebut sudah ada.');
        }

        // Simpan data
        $data = new Kuota();
        $data->id_beasiswa = $request->id_beasiswa;
        $data->id_kelas = $request->id_kelas;
        $data->kuota = $request->kuota;
        $data->save();

        return redirect('/kuota')->with('success', 'Data Berhasil ditambah');
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'id_beasiswa' => 'required|exists:beasiswas,id',
            'id_kelas' => 'required|exists:kelas,id',
            'kuota' => 'required|integer|min:1',
        ], [
            'kuota.min' => 'Kuota minimal harus 1 (tidak boleh 0 atau minus).',
        ]);

        // Cek apakah sudah ada kuota untuk beasiswa & kelas tersebut (kecuali data ini sendiri)
        $cek = Kuota::where('id_beasiswa', $request->id_beasiswa)
                    ->where('id_kelas', $request->id_kelas)
                    ->where('id', '!=', $id)
                    ->first();
        if ($cek) {
            return redirect('/kuota')->with('error', 'Kuota untuk kelas tersebut sudah ada.');
        }

        // Update data
        $data = Kuota::findOrFail($id);
        $data->id_beasiswa = $request->id_beasiswa;
        $data->id_kelas = $request->id_kelas;
        $data->kuota = $request->kuota;
        $data->save();

        return redirect('/kuota')->with('success', 'Data Berhasil diedit');
    }

    public function delete($id)
    {
        $data = Kuota::findOrFail($id);
        $data->delete();
        return redirect('/kuota')->with('success', 'Data Berhasil dihapus');
    }
}
