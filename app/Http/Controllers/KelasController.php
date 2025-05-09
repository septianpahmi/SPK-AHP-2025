<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function index()
    {
        $data = Kelas::all();
        return view('admin.component.kelas', compact('data'));
    }
    public function post(Request $request)
    {
        $kelas = new Kelas();
        $kelas->tingkat = $request->tingkat;
        $kelas->kelas = $request->kelas;
        $kelas->save();
        return redirect('/kelas')->with('success', 'Kelas berhasil ditambah.');
    }
    public function update(Request $request, $id)
    {
        $kelas = Kelas::find($id);
        $kelas->tingkat = $request->tingkat;
        $kelas->kelas = $request->kelas;
        $kelas->save();
        return redirect('/kelas')->with('success', 'Kelas berhasil diupdate.');
    }
    public function delete($id)
    {
        $kelas = Kelas::find($id);
        $kelas->delete();
        return redirect('/kelas')->with('success', 'Kelas berhasil dihapus.');
    }
}
