<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DataKkController;
use App\Http\Controllers\DataRtController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\KeluargaController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\tamuController;
use App\Http\Controllers\TanggapanController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\userController;
use App\Models\Keluarga;
use App\Models\Pengumuman;

use function App\Http\Controllers\tambahUser;

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

//ROUTE LOGIN
Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/', [LoginController::class, 'login']);

//===========================================================================//
//Route Ke DASHBOARD
Route::get('/home', 'HomeController@index')->name('home');


//ROUTE PROFILE ACCOUNT
Route::get('/profile', 'ProfileController@index')->name('profile');
Route::put('/profile', 'ProfileController@update')->name('profile.update');

//============================================================================//

//ROUTE SEMENTARA
Route::get('/about', function () {
    return view('about');
})->name('about');


//=============================================================================//
//ROUTE HALAMAN DATA WARGA
//=============================================================================//
//Route ke halaman data warga
Route::get('/rt', 'DataRtController@index')->name('rt');
Route::get('/kk', 'DataKkController@index')->name('kk');
Route::get('/keluarga', 'KeluargaController@index')->name('keluarga');
Route::get('/kepala-keluarga/{id}/anggota', 'KeluargaController@anggotaKeluarga')->name('kepala-keluarga.anggota');


/*
    ROUTE TAMBAH DATA WARGA
*/
//routing tambah rt
Route::post('/tambah/rt', 'DataRtController@tambahRt');
//routing tambah KK
Route::post('/tambah/kk', 'DataKkController@tambahKk');
//routing tambah Anggota Keluarga
Route::post('/tambah/k', 'KeluargaController@tambahKeluarga');

/*  
    ROUTE FETCH DATA WARGA
*/
//Routing Fetch Data RT
Route::get('/data/rt', 'DataRtController@getDataRt');
//Routing Fetch Data KK
Route::get('/data/kk', 'DataKkController@getDataKk');
//routing fetch data keluarga
Route::get('/data/k', 'KeluargaController@getDataK');


/*
    ROUTE EDIT DATA WARGA
*/
//Routing edit rt
Route::post('/edit/rt', 'DataRtController@editDataRt');
//Routing edit KK
Route::post('/edit/kk', 'DataKkController@editDataKk');
//Routing edit Keluarga
Route::post('/edit/k', 'KeluargaController@editDataKeluarga');


//Routing hapus RT
Route::get('hapus/rt/{id}', 'DataRtController@hapusRt');
Route::get('hapus/kk/{id}', 'DataKkController@hapusKk');
Route::get('hapus/k/{id}', 'KeluargaController@hapusK');

/*
    ROUTE DETAIL WARGA
*/
Route::get('/rt/{id}', [DataRtController::class, 'showRtDetail'])->name('rt.detail');
Route::get('/kk/{id}', [DataKkController::class, 'showKkDetail'])->name('kk.detail');
Route::get('/k/{id}', [KeluargaController::class, 'showKeluargaDetail'])->name('k.detail');

// web.php

Route::get('/kk/{id}/anggota', 'DataKkController@showAnggotaKeluarga')->name('kk.anggota');



//=============================================================================//
//SELESAI
//=============================================================================//

//=============================================================================//
//Pengumuman
//=============================================================================//
Route::get('/pengumuman', [PengumumanController::class, 'index'])->name('pengumuman');

//tambah pengumuman
Route::post('/tambah/pengumuman', 'PengumumanController@tambahPengumuman');
//fetch data pengumuman
Route::get('/data/pengumuman', 'PengumumanController@getDataPengumuman');
//Edit pengumuman
Route::post('edit/pengumuman', 'PengumumanController@editDataPengumuman');
//hapus pemgumuman
Route::get('hapus/pengumuman/{id}', 'PengumumanController@hapusPengumuman');
//Detail Pengumuman
Route::get('/pengumuman/{id}', [PengumumanController::class, 'showPengumumanDetail'])->name('pengumuman.detail');


//=============================================================================//
//PENGADUAN
//=============================================================================//
Route::get('/pengaduan', [PengaduanController::class, 'index'])
    ->name('pengaduan')
    ->middleware('auth', 'warga');

Route::get('/pengaduan/create', [PengaduanController::class, 'create'])
    ->name('buat_pengaduan')
    ->middleware('auth');

Route::post('/pengaduan/store', [PengaduanController::class, 'store'])
    ->name('store_pengaduan')
    ->middleware('auth');

Route::get('hapus/pengaduan/{id}', [PengaduanController::class, 'hapusPengaduan'])
    ->name('hapus_pengaduan')
    ->middleware('auth');

Route::get('/admin/pengaduan', [PengaduanController::class, 'adminIndex'])
    ->name('pengaduan_admin')
    ->middleware('auth', 'admin');

Route::get('/pengaduan/{id}', [PengaduanController::class, 'showPengaduanDetail'])
    ->name('pengaduan_detail');

Route::get('tanggapan/{id}', [TanggapanController::class, 'show'])->name('tanggapan.show');

// Menyimpan tanggapan
Route::post('tanggapan/store', [TanggapanController::class, 'store'])->name('tanggapan.store');

// Contoh di dalam file web.php
Route::get('tanggapan/{id}', 'TanggapanController@show')->name('tanggapan.show');


//=============================================================================//
//TAMU
//=============================================================================//
Route::get('/tamu', 'tamuController@index')->name('tamu');
Route::post('/tambah/tamu', 'tamuController@tambahTamu');
Route::get('/hapus/tamu/{id}', 'tamuController@hapusTamu');
Route::get('/tamu/{id}', [tamuController::class, 'showTamuDetail'])->name('tamu.detail');
Route::get('/update-status-tamu/{id}', 'TamuController@updateStatus')->name('tamu.updateStatus');

//===============================================================================//
//Tambah Akun
//===============================================================================//
Route::get('/user', 'userController@index')->name('user');
Route::get('/user/halamanAkun', 'userController@halamanTambahAkun')->name('halaman_TambahAkun');
Route::post('/user/tambah', 'userController@tambahUser')->name('tambah_user');
Route::get('/hapus/akun/{id}', 'userController@hapusUser');
Route::get('/reset-password/{id}', 'UserController@resetPassword');

//EXPORT EXCEL
Route::get('/export/rt', [HomeController::class, 'exportRT'])->name('export.rt');
Route::get('/export/kk', [HomeController::class, 'exportKK'])->name('export.kk');
Route::get('/export/k', [HomeController::class, 'exportK'])->name('export.k');
