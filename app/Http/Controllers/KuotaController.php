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
        $cek = Kuota::where('id_beasiswa', $request->id_beasiswa)->where('id_kelas', $request->id_kelas)->first();
        if ($cek) {
            return redirect('/kuota')->with('error', 'Kuota untuk kelas tersebut sudah ada.');
        }
        $data = new Kuota();
        $data->id_beasiswa = $request->id_beasiswa;
        $data->id_kelas = $request->id_kelas;
        $data->kuota = $request->kuota;
        $data->save();
        return redirect('/kuota')->with('success', 'Data Berhasil ditambah');
    }

    public function update(Request $request, $id)
    {
        $cek = Kuota::where('id_beasiswa', $request->id_beasiswa)->where('id_kelas', $request->id_kelas)->where('id', '!=', $id)->first();
        if ($cek) {
            return redirect('/kuota')->with('error', 'Kuota untuk kelas tersebut sudah ada.');
        }
        $data = Kuota::find($id);
        $data->id_beasiswa = $request->id_beasiswa;
        $data->id_kelas = $request->id_kelas;
        $data->kuota = $request->kuota;
        $data->save();
        return redirect('/kuota')->with('success', 'Data Berhasil diedit');
    }

    public function delete($id)
    {
        $data = Kuota::find($id);
        $data->delete();
        return redirect('/kuota')->with('success', 'Data Berhasil dihapus');
    }
}
