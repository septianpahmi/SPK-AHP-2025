<?php

namespace App\Http\Controllers;

use App\Models\DataSiswa;
use App\Models\Kelas;
use App\Models\KelaSiswa;
use App\Models\Peserta;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function index()
    {
        $data = DataSiswa::all();
        $user = User::where('role', 'siswa')->get();
        $kelas = Kelas::all();
        return view('admin.component.profil', compact('data', 'user', 'kelas'));
    }

    public function store(Request $request, $id)
    {
        $userId = Auth::user()->id;
        $kelas = KelaSiswa::where('user_id', $userId)->first();
        // dd($kelas);
        $sktmname = null;
        if ($request->hasFile('sktm')) {
            $file = $request->file('sktm');
            $ext = $file->getClientOriginalExtension();
            $sktmname = time() . '.' . $ext;
            $file->move('file/sktm', $sktmname);
        }

        $dokname = null;
        if ($request->hasFile('dok_lainnya')) {
            $file = $request->file('dok_lainnya');
            $ext = $file->getClientOriginalExtension();
            $dokname = time() . '.' . $ext;
            $file->move('file/dok_lainnya', $dokname);
        }
        $isCompleteSiswa = !empty($request->nis) &&
            !empty($request->nama) &&
            !empty($request->gender) &&
            !empty($request->alamat) &&
            !empty($request->tempat_lahir) &&
            !empty($request->tgl_lahir) &&
            !empty($request->nama_ayah) &&
            !empty($request->nama_ibu) &&
            !empty($kelas->kelas_id);
        $dataSiswa = [
            'nis' => $request->nis,
            'nama' => $request->nama,
            'gender' => $request->gender,
            'alamat' => $request->alamat,
            'tempat_lahir' => $request->tempat_lahir,
            'tgl_lahir' => $request->tgl_lahir,
            'nama_ayah' => $request->nama_ayah,
            'nama_ibu' => $request->nama_ibu,
            'id_kelas' => $kelas->kelas_id,
            'id_user' => $userId,
            'status' => $isCompleteSiswa ? 'Submit' : 'Draft',
        ];
        DataSiswa::updateOrCreate(
            ['id_user' => $userId],
            $dataSiswa
        );
        $isCompleteDaftar = !empty($request->pekerjaan) &&
            !empty($request->penghasilan) &&
            !empty($request->tanggungan) &&
            !empty($request->asset) &&
            !empty($request->sktm) &&
            !empty($request->dok_lainnya);

        $daftar = [
            'id_beasiswa' => $id,
            'id_siswa' => $userId,
            'id_kelas' => $kelas->kelas_id,
            'pekerjaan' => $request->pekerjaan,
            'penghasilan' => $request->penghasilan,
            'tanggungan' => $request->tanggungan,
            'asset' => $request->asset,
            'status' => $isCompleteDaftar ? 'Mendaftar' : 'Draft',
            'sktm' => $sktmname,
            'dok_lainnya' => $dokname,
        ];
        Peserta::updateOrCreate(['id_siswa' => $userId], $daftar);
        $user = User::find($userId);
        if ($isCompleteSiswa && $isCompleteDaftar) {
            $user->status = 'lengkap';
            $user->save();
            return redirect('/dashboard')->with('success', 'Berhasil mendaftar beasiswa.');
        } else {
            return redirect('/dashboard')->with('success', 'Data disimpan sebagai draft.');
        }
    }

    public function update(Request $request, $id)
    {
        $user = User::where('name', $request->nama)->first();
        $data = DataSiswa::find($id);
        $data->nis = $request->nis;
        $data->nama = $request->nama;
        $data->gender = $request->gender;
        $data->semester = $request->semester;
        $data->tahun_masuk = $request->tahun_masuk;
        $data->alamat = $request->alamat;
        $data->tempat_lahir = $request->tempat_lahir;
        $data->tgl_lahir = $request->tgl_lahir;
        $data->nama_ayah = $request->nama_ayah;
        $data->pekerjaan_ayah = $request->pekerjaan_ayah;
        $data->nama_ibu = $request->nama_ibu;
        $data->pekerjaan_ibu = $request->pekerjaan_ibu;
        $data->anak_ke = $request->anak_ke;
        $data->saudara = $request->saudara;
        $data->id_kelas = $request->id_kelas;
        $data->id_user = $user->id;
        $data->save();
        return redirect('/profil-siswa')->with('success', 'Data Siswa Berhasil diupdate.');
    }

    public function delete($id)
    {
        $data = DataSiswa::find($id);
        $data->delete();
        return redirect('/profil-siswa')->with('success', 'Data Siswa Berhasil di hapus.');
    }
}
