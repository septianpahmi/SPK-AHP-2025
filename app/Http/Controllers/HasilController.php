<?php

namespace App\Http\Controllers;

use App\Models\Hasil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Peserta;

class HasilController extends Controller
{
    public function index()
    {
        $datahasil = Hasil::all();
        $datamax = DB::table('hasils')
            ->orderBy('ahp', 'desc')
            ->limit(1)
            ->get();
        return view('admin.component.hasil', compact('datahasil', 'datamax'));
    }

    public function delete($id)
    {
        $data = Hasil::find($id);
        $data->delete();
        return redirect('/hasil')->with('success', 'Data berhasil di hapus');
    }

    public function ajukan($id)
    {
        $data = Hasil::find($id);
        $data->status = 'Diproses';
        $data->save();
        return redirect('/hasil')->with('success', 'Data berhasil di ajukan');
    }

    public function verifikasi($id)
    {
        $data = Hasil::find($id);
        $data->status = 'Lolos Verifikasi';
        $data->save();
        return redirect('/hasil')->with('success', 'Data berhasil di Verifikasi');
    }
    public function nonverifikasi($id)
    {
        $data = Hasil::find($id);
        $data->status = 'Tidak Lolos Verifikasi';
        $data->save();
        return redirect('/hasil')->with('success', 'Data ditolak');
    }

    public function hasil()
    {
        $user = auth()->user()->id;
        $datahasil = Hasil::where('id_siswa', $user)->get();
        $datamax = DB::table('hasils')
            ->orderBy('ahp', 'desc')
            ->limit(1)
            ->get();
        return view('admin.component.hasil-user', compact('datahasil', 'datamax'));
    }
}
