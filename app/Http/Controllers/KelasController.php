<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
     public function index()
    {
        $data = Kelas::all();

        // generate tahun ajaran: tahun sekarang s.d. 5 tahun ke depan
        $start = now()->year;              // atau Carbon::now()->year
        $tahunAjaran = [];
        for ($y = $start; $y <= $start + 5; $y++) {
            $tahunAjaran[] = $y . '/' . ($y + 1);
        }

        return view('admin.component.kelas', compact('data', 'tahunAjaran'));
    }
   public function post(Request $request)
{
    $request->validate([
        'tingkat' => 'required|string|max:50',
        'kelas' => 'required|string|max:50',
        'tahun_ajaran' => 'required|string|max:20',
    ]);

    $kelas = new Kelas();
    $kelas->tingkat = $request->tingkat;
    $kelas->kelas = $request->kelas;
    $kelas->tahun_ajaran = $request->tahun_ajaran;
    $kelas->save();

    return redirect()->route('kelas')->with('success', 'Kelas berhasil ditambah.');

}

public function update(Request $request, $id)
{
    $request->validate([
        'tingkat' => 'required|string|max:50',
        'kelas' => 'required|string|max:50',
        'tahun_ajaran' => 'required|string|max:20',
    ]);

    $kelas = Kelas::findOrFail($id);
    $kelas->tingkat = $request->tingkat;
    $kelas->kelas = $request->kelas;
    $kelas->tahun_ajaran = $request->tahun_ajaran;
    $kelas->save();

    return redirect()->route('kelas')->with('success', 'Kelas berhasil diubah.');
}
    public function delete($id)
    {
        $kelas = Kelas::find($id);
        $kelas->delete();
        return redirect('/kelas')->with('success', 'Kelas berhasil dihapus.');
    }
}
