<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GajiController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\LemburController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\PolaKerjaController;
use App\Http\Controllers\DepartementController;
use App\Http\Controllers\KomponenGajiController;
use App\Http\Controllers\KalenderKerjaController;
use App\Http\Controllers\KelompokKerjaController;

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
    return redirect('login');
});

Route::get('/guru', function() {
    return view('guru.index');
});

Route::get('/setting', 'App\Http\Controllers\SettingController@index')->name('setting.index');
Route::post('/setting', 'App\Http\Controllers\SettingController@save')->name('setting.save');

Route::get('kelompokkerja/{id}/polakerja','App\Http\Controllers\KelompokKerjaController@polaKerja');
Route::post('simpan-pola-kerja-kelompok-guru','App\Http\Controllers\KelompokKerjaController@simpanPolaKerja')->name('simpanPolaKerja.simpanPolaKerja');
Route::delete('hapus-pola-kerja-kelompok-guru/{id}', 'App\Http\Controllers\KelompokKerjaController@hapusPolaKerja')->name('hapus.hapusPolaKerja');
Route::post('/tambah-kelompok-kerja', 'App\Http\Controllers\KelompokKerjaController@tambahAnggota')->name('tambah.tambahAnggota');
Route::delete('hapus-anggota-kelompok-kerja/{id}', 'App\Http\Controllers\KelompokKerjaController@hapusAnggota')->name('hapus.hapusAnggota'); 
Route::resource('/kelompokkerja', KelompokKerjaController::class);

Route::resource('/polakerja', PolaKerjaController::class);

Route::resource('/departemen', DepartementController::class);
Route::resource('/jabatan', JabatanController::class);

Route::get('/guru/{id}/kehadiran', 'App\Http\Controllers\GuruController@kehadiran');    
Route::get('/guru/{id}/polakerja', 'App\Http\Controllers\GuruController@polaKerja');    
Route::get('/guru/{id}/lembur', 'App\Http\Controllers\GuruController@lembur');    

Route::resource('/guru', GuruController::class);
Route::resource('/kalenderKerja', KalenderKerjaController::class);

Route::get('/kehadiran', 'App\Http\Controllers\KehadiranController@index')->name('kehadiran.index');
Route::get('/kehadiran/create', 'App\Http\Controllers\KehadiranController@create')->name('kehadiran.create');
Route::post('/kehadiran/store', 'App\Http\Controllers\KehadiranController@store')->name('kehadiran.store');
Route::post('export-laporan-kehadiran-excel','App\Http\Controllers\KehadiranController@excel')->name('exportData.excel');
Route::post('import-laporan-kehadiran-excel','App\Http\Controllers\KehadiranController@import')->name('importData.excel');


Route::post('ubah-periode-kehadiran', 'App\Http\Controllers\KehadiranController@ubahPeriodeKehadiran')->name('kehadiran.ubahPeriodeKehadiran'); 
Route::get('lembur', 'App\Http\Controllers\LemburController@index');
Route::get('lembur/create', 'App\Http\Controllers\LemburController@create');
Route::post('lembur', 'App\Http\Controllers\LemburController@store')->name('simpanLembur.store');
Route::post('ubah-periode-lembur', 'App\Http\Controllers\LemburController@ubahPeriodeLembur')->name('lembur.ubahPeriodeLembur');
Route::delete('hapus-riwayat-lembur/{id}/{url}', 'App\Http\Controllers\LemburController@destroy')->name('hapusLembur.destroy');


Route::resource('/komponengaji', KomponenGajiController::class);
Route::resource('/laporangaji', GajiController::class);
Route::post('/ubah-periode-gaji', 'App\Http\Controllers\GajiController@ubahPeriodeGaji')->name('ubah.ubahPeriodeGaji');
Route::post('/tambah-komponen-gaji-detail', 'App\Http\Controllers\GajiController@tambahKomponenDetail')->name('tambah.tambahKomponenDetail');
Route::delete('hapus-komponen-gaji-detail/{id}', 'App\Http\Controllers\GajiController@hapusKomponenDetail')->name('hapus.hapusKomponenDetail');
Route::get('/laporangaji/{id}/pdf', [GajiController::class, 'pdf']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
