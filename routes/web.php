<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();
Route::get('/', function () {
    return view('welcome');
});

Route::get('/kriteria2', [App\Http\Controllers\kriteria2Controller::class, 'show']);
Route::get('/kriteria2/sub/{id}', [App\Http\Controllers\kriteria2Controller::class, 'sub']);
Route::get('/kriteria2/doc/{id}', [App\Http\Controllers\kriteria2Controller::class, 'doc']);
Route::get('/kriteria2/dokumen/{id}', [App\Http\Controllers\kriteria2Controller::class, 'dokumen']);

Route::get('/lihat/{id}', [App\Http\Controllers\dokumenController::class, 'lihat'])->name('/lihat');

Route::get('/ubah_pw', [App\Http\Controllers\passwordController::class, 'show'])->name('ubah_pw');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('/home');

Route::post('/ubah_pw/{id}', [App\Http\Controllers\passwordController::class, 'ubah']);

Route::group(['prefix' => 'staff', 'middleware' => ['staff']], function(){
    Route::get('/home', [App\Http\Controllers\StaffController::class, 'home'])->name('staff/home');

    Route::get('/kelola_mahasiswa', [App\Http\Controllers\kelolaMahasiswaController::class, 'show'])->name('staff/kelola_mahasiswa');
    Route::get('/kelola_mahasiswa/tampil', [App\Http\Controllers\kelolaMahasiswaController::class, 'tampil'])->name('staff/kelolaMahasiswa/tampil');
    Route::get('/kelola_mahasiswa/detail/{detail}', [App\Http\Controllers\kelolaMahasiswaController::class, 'detail'])->name('staff/kelolaMahasiswa/detail');
    Route::get('/kelola_mahasiswa/hapus/{hapus}', [App\Http\Controllers\kelolaMahasiswaController::class, 'hapus']);
    Route::post('/kelola_mahasiswa/tambah', [App\Http\Controllers\kelolaMahasiswaController::class, 'tambah']);
    Route::get('/kelolaMahasiswa/cetak/{cetak}', [App\Http\Controllers\kelolaMahasiswaController::class, 'detail'])->name('staff/kelolaMahasiswa/detail');
    Route::post('/kelola_mahasiswa/ubah/{id}', [App\Http\Controllers\kelolaMahasiswaController::class, 'ubah'])->name('staff/kelola_mahasiswa/ubah');
    Route::get('/kelola_mahasiswa/cek', [App\Http\Controllers\kelolaMahasiswaController::class, 'cek']);

    Route::get('/kelola_alumni', [App\Http\Controllers\kelolaAlumniController::class, 'show'])->name('staff/kelola_alumni');
    Route::get('/kelola_alumni/tampil', [App\Http\Controllers\kelolaAlumniController::class, 'tampil'])->name('staff/kelola_alumni/tampil');
    Route::get('/kelola_alumni/detail/{detail}', [App\Http\Controllers\kelolaAlumniController::class, 'detail'])->name('staff/kelola_alumni/detail');
    Route::get('/kelola_alumni/hapus/{hapus}', [App\Http\Controllers\kelolaAlumniController::class, 'hapus'])->name('staff/kelola_alumni/hapus');
    Route::post('/kelola_alumni/detail/{detail}', [App\Http\Controllers\kelolaAlumniController::class, 'detail'])->name('staff/kelola_alumni/detail');
    Route::post('/kelola_alumni/ubah/{id}', [App\Http\Controllers\kelolaAlumniController::class, 'ubah'])->name('staff/kelola_alumni/ubah');
    Route::get('/kelola_alumni/cetak/{cetak}', [App\Http\Controllers\kelolaAlumniController::class, 'detail'])->name('staff/kelola_alumni/detail');

    Route::get('/kelola_assesor', [App\Http\Controllers\kelolaAssesorController::class, 'show'])->name('staff/kelola_assesor');
    Route::get('/kelola_assesor/tampil', [App\Http\Controllers\kelolaAssesorController::class, 'tampil'])->name('staff/kelola_assesor/tampil');
    Route::post('/kelola_assesor/tambah', [App\Http\Controllers\kelolaAssesorController::class, 'tambah']);
    Route::get('/kelola_assesor/detail/{detail}', [App\Http\Controllers\kelolaAssesorController::class, 'detail'])->name('staff/kelola_assesor/detail');
    Route::get('/kelola_assesor/hapus/{hapus}', [App\Http\Controllers\kelolaAssesorController::class, 'hapus']);
    Route::post('/kelola_assesor/ubah/{id}', [App\Http\Controllers\kelolaAssesorController::class, 'ubah'])->name('staff/kelola_assesor/ubah');

    Route::get('/kelola_dosen', [App\Http\Controllers\kelolaDosenController::class, 'show'])->name('staff/kelola_dosen');
    Route::get('/kelola_dosen/tampil', [App\Http\Controllers\kelolaDosenController::class, 'tampil'])->name('staff/kelola_dosen/tampil');
    Route::get('/kelola_dosen/detail/{detail}', [App\Http\Controllers\kelolaDosenController::class, 'detail'])->name('staff/kelola_dosen/detail');
    Route::get('/kelola_dosen/hapus/{hapus}', [App\Http\Controllers\kelolaDosenController::class, 'hapus']);
    Route::post('/kelola_dosen/tambah', [App\Http\Controllers\kelolaDosenController::class, 'tambah']);
    Route::get('/kelolaMahasiswa/cetak/{cetak}', [App\Http\Controllers\kelolaDosenController::class, 'detail'])->name('staff/kelola_dosen/detail');
    Route::post('/kelola_dosen/ubah/{id}', [App\Http\Controllers\kelolaDosenController::class, 'ubah'])->name('staff/kelola_dosen/ubah');

    Route::get('/kelola_dokumen', [App\Http\Controllers\kelolaDokumenController::class, 'show'])->name('staff/kelola_dokumen');
    Route::get('/kelola_dokumen/tampil', [App\Http\Controllers\kelolaDokumenController::class, 'tampil'])->name('staff/kelola_dokumen/tampil');
    Route::post('/kelola_dokumen/tambah', [App\Http\Controllers\kelolaDokumenController::class, 'tambah']);
    Route::get('/kelola_dokumen/detail/{detail}', [App\Http\Controllers\kelolaDokumenController::class, 'detail'])->name('staff/kelola_dokumen/detail');
    Route::get('/kelola_dokumen/hapus/{hapus}', [App\Http\Controllers\kelolaDokumenController::class, 'hapus']);
    Route::post('/kelola_dokumen/ubah/{id}', [App\Http\Controllers\kelolaDokumenController::class, 'ubah'])->name('staff/kelola_dokumen/ubah');
    Route::get('/kelola_dokumen/unduh/{id}', [App\Http\Controllers\kelolaDokumenController::class, 'unduh']);
    Route::get('/kelola_dokumen/kat/{id}', [App\Http\Controllers\kelolaDokumenController::class, 'kat']);

    Route::get('/kelola_mitra', [App\Http\Controllers\kelolaMitraController::class, 'show'])->name('staff/kelola_mitra');
    Route::get('/kelola_mitra/tampil', [App\Http\Controllers\kelolaMitraController::class, 'tampil'])->name('staff/kelola_mitra/tampil');
    Route::post('/kelola_mitra/tambah', [App\Http\Controllers\kelolaMitraController::class, 'tambah']);
    Route::get('/kelola_mitra/detail/{detail}', [App\Http\Controllers\kelolaMitraController::class, 'detail'])->name('staff/kelola_mitra/detail');
    Route::get('/kelola_mitra/hapus/{hapus}', [App\Http\Controllers\kelolaMitraController::class, 'hapus']);
    Route::post('/kelola_mitra/ubah/{id}', [App\Http\Controllers\kelolaMitraController::class, 'ubah'])->name('staff/kelola_mitra/ubah');

    Route::get('/kelola_penilaian', [App\Http\Controllers\kelolaPenilaianController::class, 'show'])->name('staff/kelola_penilaian');
    Route::get('/kelola_penilaian/tampil', [App\Http\Controllers\kelolaPenilaianController::class, 'tampil'])->name('staff/kelola_penilaian/tampil');
    Route::get('/kelola_penilaian/hapus/{hapus}', [App\Http\Controllers\kelolaPenilaianController::class, 'hapus']);
    Route::get('/kelola_penilaian/unduh/{year}', [App\Http\Controllers\kelolaPenilaianController::class, 'unduh']);
});

Route::group(['prefix' => 'assesor', 'middleware' => ['assesor']], function(){
    Route::get('/home', [App\Http\Controllers\AssesorController::class, 'home'])->name('assesor/home');

    Route::get('/penilaian', [App\Http\Controllers\penilaianController::class, 'show'])->name('assesor/penilaian');
    Route::get('/penilaian/sub/{id}', [App\Http\Controllers\penilaianController::class, 'sub']);
    Route::get('/penilaian/doc/{id}', [App\Http\Controllers\penilaianController::class, 'doc']);
    Route::get('/penilaian/dokumen/{id}', [App\Http\Controllers\penilaianController::class, 'dokumen']);
    Route::post('/penilaian/nilai', [App\Http\Controllers\penilaianController::class, 'nilai'])->name('');
    Route::get('/penilaian/smnt/{id}', [App\Http\Controllers\penilaianController::class, 'smnt']);

});

Route::group(['prefix' => 'alumni', 'middleware' => ['alumni']], function(){
    Route::get('/home', [App\Http\Controllers\AlumniController::class, 'home'])->name('alumni/home');
});

Route::group(['prefix' => 'dosen', 'middleware' => ['dosen']], function(){
    Route::get('/home', [App\Http\Controllers\DosenController::class, 'home'])->name('dosen/home');
});

Route::group(['prefix' => 'mahasiswa', 'middleware' => ['mahasiswa']], function(){
    Route::get('/home', [App\Http\Controllers\MahasiswaController::class, 'home'])->name('mahasiswa/home');
});

Route::group(['prefix' => 'mitra', 'middleware' => ['mitra']], function(){
    Route::get('/home', [App\Http\Controllers\MitraController::class, 'home'])->name('mitra/home');
});
