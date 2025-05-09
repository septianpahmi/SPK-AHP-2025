<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DokumenController extends Controller
{
    public function index()
    {
        $data = Peserta::all();
        return view('admin.component.dokumen', compact('data'));
    }
}
