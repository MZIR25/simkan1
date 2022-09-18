<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PermohonanCutiController;
use App\Http\Controllers\DaftarGajiController;
use App\Http\Controllers\JobdeskController;
use app\Jobdesk;
use app\Gaji;
use app\Cuti;
use app\Karyawan;
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
//permohonan_cuti
Route::get('/permohonan_cuti', [PermohonanCutiController::class, 'index'])->name('permohonan_cuti');
Route::get('/unggah_cuti', [PermohonanCutiController::class, 'create'])->name('unggah_cuti');
Route::post('/simpan_cuti', [PermohonanCutiController::class, 'store'])->name('simpan_cuti');
Route::get('/edit_cuti/{id}', [PermohonanCutiController::class, 'edit'])->name('edit_cuti');
Route::put('/update_cuti/{id}', [PermohonanCutiController::class, 'update'])->name('update_cuti');
Route::delete('/delete_cuti/{id}', [PermohonanCutiController::class, 'destroy'])->name('delete_cuti');
//Gaji
Route::get('/daftar_gaji', [DaftarGajiController::class, 'index'])->name('daftar_gaji');
Route::get('/unggah_gaji', [DaftarGajiController::class, 'create'])->name('unggah_gaji');
Route::post('/simpan_gaji', [DaftarGajiController::class, 'store'])->name('simpan_gaji');
Route::get('/edit_gaji/{id}', [DaftarGajiController::class, 'edit'])->name('edit_gaji');
Route::put('/update_gaji/{id}', [DaftarGajiController::class, 'update'])->name('update_gaji');
Route::delete('/delete_gaji/{id}', [DaftarGajiController::class, 'destroy'])->name('delete_gaji');
//Jobdesk
Route::get('/daftar_jobdesk', [JobdeskController::class, 'index'])->name('daftar_jobdesk');
Route::get('/unggah_jobdesk', [JobdeskController::class, 'create'])->name('unggah_jobdesk');
Route::post('/simpan_jobdesk', [JobdeskController::class, 'store'])->name('simpan_jobdesk');
Route::get('/edit_jobdesk/{id}', [JobdeskController::class, 'edit'])->name('edit_jobdesk');
Route::put('/update_jobdesk/{id}', [JobdeskController::class, 'update'])->name('update_jobdesk');
Route::delete('/delete_jobdesk/{id}', [JobdeskController::class, 'destroy'])->name('delete_jobdesk');

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

