<?php

namespace App\Http\Controllers;

use App\Models\Beasiswa;
use App\Models\Kuota;
use Illuminate\Http\Request;

class BeasiswaController extends Controller
{
    public function index()
    {
        $data = Beasiswa::all();
        return view('admin.component.beasiswa', compact('data'));
    }

    public function post(Request $request)
    {
        $beasiswa = new Beasiswa();
        $beasiswa->nama_beasiswa = $request->nama_beasiswa;
        $beasiswa->ket = $request->ket;
        $beasiswa->tahun = $request->tahun;
        $beasiswa->save();
        return redirect('/beasiswa')->with('success', 'Beasiswa berhasil dibuat');
    }
    public function update(Request $request, $id)
    {
        $beasiswa = Beasiswa::find($id);
        $beasiswa->nama_beasiswa = $request->nama_beasiswa;
        $beasiswa->ket = $request->ket;
        $beasiswa->tahun = $request->tahun;
        $beasiswa->save();
        return redirect('/beasiswa')->with('success', 'Beasiswa berhasil diupdate');
    }
    public function delete($id)
    {
        $beasiswa = Beasiswa::find($id);
        $beasiswa->delete();
        return redirect('/beasiswa')->with('success', 'Beasiswa berhasil dihapus');
    }

    public function nonaktif($id)
    {
        $beasiswa = Beasiswa::find($id);
        $beasiswa->status = 'Non aktif';
        $beasiswa->save();
        return redirect('/beasiswa')->with('success', 'Beasiswa berhasil dinonaktifkan');
    }
}
