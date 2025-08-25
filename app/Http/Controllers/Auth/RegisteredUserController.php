<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use App\Models\KelaSiswa;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {   $kelas = Kelas::all();
        return view('auth.register', compact('kelas'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'     => ['required', 'string', 'max:255'],
            'nis'      => ['required', 'string', 'max:15', 'unique:users,nis'],
            'email'    => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ], [
            // custom error message biar lebih user friendly
            'nis.unique'   => 'NIS yang kamu masukkan sudah terdaftar.',
            'email.unique' => 'Email yang kamu masukkan sudah terdaftar.',
        ]);

        $user = User::create([
            'name'     => $request->name,
            'nis'      => $request->nis,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);
        KelaSiswa::create([
            'user_id' => $user->id,
            'kelas_id' => $request->kelas_id,
        ]);
        event(new Registered($user));

        return redirect('/login')->with('success', 'Akun berhasil dibuat. Silakan login.');
    }
}
