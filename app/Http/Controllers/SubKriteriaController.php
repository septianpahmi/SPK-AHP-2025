<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use App\Models\Subkriteria;
use Illuminate\Http\Request;

class SubKriteriaController extends Controller
{
    public function index($id){
        $kriteria = Kriteria::find($id);
        $data = Subkriteria::where('id_kriteria',$id)->get();
        return view('admin.component.subkriteria',compact('data','kriteria'));
    }

    public function post(Request $request, $id){
        $kriteria = Kriteria::find($id);
        $sub = new Subkriteria();
        $sub -> subkriteria = $request -> subkriteria;
        $sub -> nilai = $request -> nilai;
        $sub -> id_kriteria = $kriteria -> id;
        $sub -> save();
        return redirect()->back()->with('success','Sub Keriteria berhasil dibuat.');
    }
    public function delete($id){
        $sub = Subkriteria::find($id);
        $sub -> delete();
        return redirect()->back()->with('success','Sub Keriteria berhasil dibuat.');
    }
}
