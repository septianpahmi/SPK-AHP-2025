<?php

use App\Http\Controllers\AlternativController;
use App\Http\Controllers\AnalisisController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\BeasiswaController;
use App\Http\Controllers\DokumenController;
use App\Http\Controllers\HasilController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\KuotaController;
use App\Http\Controllers\PesertaController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\SubKriteriaController;
use Symfony\Component\HttpKernel\Profiler\Profile;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

require __DIR__ . '/auth.php';
Route::get('/', function () {
    return view('auth.login');
});

//dashboard
Route::get('/dashboard', [HomeController::class, 'index'])->middleware(['auth'])->name('dashboard');
//kelas
Route::get('/kelas', [KelasController::class, 'index'])->middleware(['auth'])->name('kelas');
Route::post('/kelas/post', [KelasController::class, 'post'])->middleware(['auth'])->name('kelas.post');
Route::post('/kelas/update/{id}', [KelasController::class, 'update'])->middleware(['auth'])->name('kelas.update');
Route::get('/kelas/delete/{id}', [KelasController::class, 'delete'])->middleware(['auth'])->name('kelas.delete');
//users
Route::get('/users', [UserController::class, 'index'])->middleware(['auth'])->name('users');
Route::post('/users/post', [UserController::class, 'post'])->middleware(['auth'])->name('users.post');
Route::post('/users/update/{id}', [UserController::class, 'update'])->middleware(['auth'])->name('users.update');
Route::get('/users/delete/{id}', [UserController::class, 'delete'])->middleware(['auth'])->name('users.delete');
Route::get('/users/aktif/{id}', [UserController::class, 'aktif'])->middleware(['auth'])->name('users.aktif');
Route::get('/users/nonaktif/{id}', [UserController::class, 'nonaktif'])->middleware(['auth'])->name('users.nonaktif');
//profilsiswa
Route::get('/profil-siswa', [ProfilController::class, 'index'])->middleware(['auth'])->name('profil-siswa');
Route::post('/profil-siswa/post', [ProfilController::class, 'store'])->middleware(['auth'])->name('profil-siswa.store');
Route::post('/profil-siswa/update/{id}', [ProfilController::class, 'update'])->middleware(['auth'])->name('profil.update');
Route::get('/profil-siswa/delete/{id}', [ProfilController::class, 'delete'])->middleware(['auth'])->name('profil.delete');
//beasiswa
Route::get('/beasiswa', [BeasiswaController::class, 'index'])->middleware(['auth'])->name('beasiswa');
Route::post('/beasiswa/post', [BeasiswaController::class, 'post'])->middleware(['auth'])->name('beasiswa.post');
Route::post('/beasiswa/update/{id}', [BeasiswaController::class, 'update'])->middleware(['auth'])->name('beasiswa.update');
Route::get('/beasiswa/delete/{id}', [BeasiswaController::class, 'delete'])->middleware(['auth'])->name('beasiswa.delete');
Route::get('/beasiswa/nonaktif/{id}', [BeasiswaController::class, 'nonaktif'])->middleware(['auth'])->name('beasiswa.nonaktif');
//kriteria
Route::get('/kriteria', [KriteriaController::class, 'index'])->middleware(['auth'])->name('kriteria');
Route::post('/kriteria/post', [KriteriaController::class, 'post'])->middleware(['auth'])->name('kriteria.post');
Route::post('/kriteria/update/{id}', [KriteriaController::class, 'update'])->middleware(['auth'])->name('kriteria.update');
Route::get('/kriteria/delete/{id}', [KriteriaController::class, 'delete'])->middleware(['auth'])->name('kriteria.delete');
//kuota
Route::get('/kuota', [KuotaController::class, 'index'])->middleware(['auth'])->name('kuota');
Route::post('/kuota/post', [KuotaController::class, 'post'])->middleware(['auth'])->name('kuota.post');
Route::post('/kuota/update/{id}', [KuotaController::class, 'update'])->middleware(['auth'])->name('kuota.update');
Route::get('/kuota/delete/{id}', [KuotaController::class, 'delete'])->middleware(['auth'])->name('kuota.delete');
//peserta
Route::get('/peserta', [PesertaController::class, 'index'])->middleware(['auth'])->name('peserta');
Route::get('/peserta/delete/{id}', [PesertaController::class, 'delete'])->middleware(['auth'])->name('peserta.delete');
Route::get('/peserta/approve/{id}', [PesertaController::class, 'approve'])->middleware(['auth'])->name('peserta.approve');
Route::get('/peserta/disapprove/{id}', [PesertaController::class, 'disapprove'])->middleware(['auth'])->name('peserta.disapprove');
Route::get('/peserta/detail/{id}', [PesertaController::class, 'detail'])->middleware(['auth'])->name('peserta.detail');

Route::get('/pendaftaran/{id}', [PesertaController::class, 'pendaftaran'])->middleware(['auth'])->name('pendaftaran');
Route::post('/pendaftaran/store/{id}', [ProfilController::class, 'store'])->middleware(['auth'])->name('pendaftaran.store');

//SubKriteria
Route::get('/subkriteria/{id}', [SubKriteriaController::class, 'index'])->middleware(['auth'])->name('subkriteria');
Route::post('/subkriteria/post/{id}', [SubKriteriaController::class, 'post'])->middleware(['auth'])->name('subkriteria.post');
Route::get('/subkriteria/delete/{id}', [SubKriteriaController::class, 'delete'])->middleware(['auth'])->name('subkriteria.delete');

//analisis
Route::get('/analisis', [AnalisisController::class, 'index'])->middleware(['auth'])->name('analisis');
Route::post('/analisis/postbobot', [AnalisisController::class, 'postbobot'])->middleware(['auth'])->name('postbobot');
Route::post('/analisis/postbobot/postmatriks', [AnalisisController::class, 'postmatriks'])->middleware(['auth'])->name('postmatriks');
Route::post('/analisis/postbobot/postmatriks2', [AnalisisController::class, 'postmatriks2'])->middleware(['auth'])->name('postmatriks2');
Route::post('/analisis/postbobot/postmatriks2/konsistensi', [AnalisisController::class, 'cekkonsistensi'])->middleware(['auth'])->name('cekkonsistensi');
Route::post('/analisis/postbobot/postmatriks2/posthasilrekomendasi', [AnalisisController::class, 'posthasilrekomendasi'])->middleware(['auth'])->name('posthasilrekomendasi');

//hasil
Route::get('/hasil', [HasilController::class, 'index'])->middleware(['auth'])->name('hasil');
Route::get('/hasil/delete/{id}', [HasilController::class, 'delete'])->middleware(['auth'])->name('hasil.delete');
Route::get('/hasil/ajukan/{id}', [HasilController::class, 'ajukan'])->middleware(['auth'])->name('hasil.ajukan');
Route::get('/hasil/verifikasi/{id}', [HasilController::class, 'verifikasi'])->middleware(['auth'])->name('hasil.lolosverifikasi');
Route::get('/hasil/{id}', [HasilController::class, 'nonverifikasi'])->middleware(['auth'])->name('hasil.nonverifikasi');
Route::get('/hasil-user', [HasilController::class, 'hasil'])->middleware(['auth'])->name('hasil.analisis');

//file
Route::get('/galeri', [DokumenController::class, 'index'])->middleware(['auth'])->name('galeri');
