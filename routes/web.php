<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PermohonanCutiController;
use App\Http\Controllers\DaftarGajiController;
use App\Http\Controllers\JobdeskController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\ManajemenUserController;
use app\Jobdesk;
use app\Gaji;
use app\Cuti;
use app\Karyawan;
use app\Jabatan;
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

Route::get('/', function () {
    return view('home');
});
Route::get('/home', function () {
    return view('layouts.v_home');
});

Route::get('/index', function () {
    return view('layouts.index');

});

Route::get('/manajemen_user', [ManajemenUserController::class, 'index'])->name('manajemen_user');
Route::get('/edit_user/{id}', [ManajemenUserController::class, 'edit'])->name('edit_user');
Route::put('/update_user/{id}', [ManajemenUserController::class, 'update'])->name('update_user');
Route::delete('/delete_user/{id}', [ManajemenUserController::class, 'destroy'])->name('delete_user');
//Karyawan
Route::get('/daftar_karyawan', [KaryawanController::class, 'index'])->name('daftar_karyawan');
Route::get('/unggah_daftar_karyawan', [KaryawanController::class, 'create'])->name('unggah_daftar_karyawan');
Route::post('/simpan_karyawan', [KaryawanController::class, 'store'])->name('simpan_karyawan');
Route::get('/edit_karyawan/{karyawan_id}', [KaryawanController::class, 'edit'])->name('edit_karyawan');
Route::put('/update_karyawan/{karyawan_id}', [KaryawanController::class, 'update'])->name('update_karyawan');
Route::delete('/delete_karyawan/{karyawan_id}', [KaryawanController::class, 'destroy'])->name('delete_karyawan');
Route::get('/daftar_karyawan/export_excel', [KaryawanController::class, 'export_excel'])->name('daftar_karyawan');

//permohonan_cuti
Route::get('/permohonan_cuti', [PermohonanCutiController::class, 'index'])->name('permohonan_cuti');
Route::get('/unggah_cuti', [PermohonanCutiController::class, 'create'])->name('unggah_cuti');
Route::post('/simpan_cuti', [PermohonanCutiController::class, 'store'])->name('simpan_cuti');
Route::get('/edit_cuti/{cuti_id}', [PermohonanCutiController::class, 'edit'])->name('edit_cuti');
Route::put('/update_cuti/{cuti_id}', [PermohonanCutiController::class, 'update'])->name('update_cuti');
Route::delete('/delete_cuti/{cuti_id}', [PermohonanCutiController::class, 'destroy'])->name('delete_cuti');
Route::get('/permohonan_cuti/export_excel', [PermohonanCutiController::class, 'export_excel'])->name('permohonan_cuti');

//Gaji
Route::get('/daftar_gaji', [DaftarGajiController::class, 'index'])->name('daftar_gaji');
Route::get('/unggah_gaji', [DaftarGajiController::class, 'create'])->name('unggah_gaji');
Route::post('/simpan_gaji', [DaftarGajiController::class, 'store'])->name('simpan_gaji');
Route::get('/edit_gaji/{gaji_id}', [DaftarGajiController::class, 'edit'])->name('edit_gaji');
Route::put('/update_gaji/{gaji_id}', [DaftarGajiController::class, 'update'])->name('update_gaji');
Route::delete('/delete_gaji/{gaji_id}', [DaftarGajiController::class, 'destroy'])->name('delete_gaji');
Route::get('/daftar_gaji/export_excel', [DaftarGajiController::class, 'export_excel'])->name('daftar_gaji');

//Jobdesk
Route::get('/daftar_jobdesk', [JobdeskController::class, 'index'])->name('daftar_jobdesk');
Route::get('/unggah_jobdesk', [JobdeskController::class, 'create'])->name('unggah_jobdesk');
Route::post('/simpan_jobdesk', [JobdeskController::class, 'store'])->name('simpan_jobdesk');
Route::get('/edit_jobdesk/{jobdesk_id}', [JobdeskController::class, 'edit'])->name('edit_jobdesk');
Route::put('/update_jobdesk/{jobdesk_id}', [JobdeskController::class, 'update'])->name('update_jobdesk');
Route::delete('/delete_jobdesk/{jobdesk_id}', [JobdeskController::class, 'destroy'])->name('delete_jobdesk');
Route::get('/daftar_jobdesk/export_excel', [JobdeskController::class, 'export_excel'])->name('daftar_jobdesk');

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

