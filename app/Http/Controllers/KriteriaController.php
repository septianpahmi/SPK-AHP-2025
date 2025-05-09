<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use Illuminate\Http\Request;

class KriteriaController extends Controller
{
    public function index(){
        $data = Kriteria::all();
        return view('admin.component.kriteria',compact('data'));
    }

    public function post(Request $request){
        $existingUser = Kriteria::where('nama_kriteria', $request->nama_kriteria)->first();

        if ($existingUser) {
            return redirect('/users')->with('error', 'Kriteria sudah ada.');
        }
        $kriteria = new Kriteria();
        $kriteria -> nama_kriteria = $request -> nama_kriteria;
        $kriteria -> save();
        return redirect('/kriteria')->with('success','Kriteria berhasil dibuat');
    }
    public function update(Request $request, $id){
        $kriteria = Kriteria::find($id);
        $kriteria -> nama_kriteria = $request -> nama_kriteria;
        $kriteria -> save();
        return redirect('/kriteria')->with('success','Kriteria berhasil diupdate');
    }
    public function delete($id){
        $kriteria = Kriteria::find($id);
        $kriteria -> delete();
        return redirect('/kriteria')->with('success','Kriteria berhasil dihapus');
    }
}
