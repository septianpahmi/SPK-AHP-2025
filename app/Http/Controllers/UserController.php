<?php

namespace App\Http\Controllers;

use App\Models\DataSiswa;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $data = User::all();
        return view('admin.component.users', compact('data'));
    }
    public function post(Request $request)
    {
        $existingUser = User::where('email', $request->email)->first();

        if ($existingUser) {
            return redirect('/users')->with('error', 'Email sudah digunakan.');
        }
        if ($request->nis != null) {
            $existingnis = User::where('nis', $request->nis)->first();

            if ($existingnis) {
                return redirect('/users')->with('error', 'NIS sudah digunakan.');
            }
        }
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->input('password'));
        $user->kode_akses = $request->password;
        $user->role = $request->role;
        $user->aktivasi = 'Aktif';
        $user->save();
        return redirect('/users')->with('success', 'User berhasil dibuat.');
    }
    public function update(Request $request, $id)
    {
        $existingUser = User::where('id', $id)->first();
        if ($request->email !== $existingUser->email) {
            $emailExists = User::where('email', $request->email)->exists();
            if ($emailExists) {
                return redirect('/users')->with('error', 'Email sudah digunakan.');
            }
        }
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->input('password'));
        $user->kode_akses = $request->password;
        $user->role = $request->role;
        $user->aktivasi = 'Aktif';

        $user->save();
        return redirect('/users')->with('success', 'User berhasil diupdate.');
    }
    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('/users')->with('success', 'User berhasil dihapus.');
    }

    public function aktif($id)
    {
        $user = User::find($id);
        $user->aktivasi = 'Aktif';
        $user->save();
        return redirect('/users')->with('success', 'User berhasil diaktivasi.');
    }
    public function nonaktif($id)
    {
        $user = User::find($id);
        $user->aktivasi = 'Tidak aktif';
        $user->save();
        return redirect('/users')->with('success', 'User berhasil dinon aktifkan.');
    }
}
