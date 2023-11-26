<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DataKkController;
use App\Http\Controllers\DataRtController;
use App\Http\Controllers\PengumumanController;
use App\Models\Keluarga;
use App\Models\Pengumuman;

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
Route::get('/tamu', 'tamuController@index');

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
Route::get('/data/k', 'DataKkController@getDataK');


/*
    ROUTE EDIT DATA WARGA
*/
//Routing edit rt
Route::post('/edit/rt', 'DataRtController@editDataRt');
//Routing edit KK
Route::post('/edit/kk', 'DataKkController@editDataKk');
//Routing edit Keluarga
Route::post('/edit/k', 'KeluargaController@editDataKeluarga');


/*
    ROUTE HAPUS DATA WARGA
*/
//Routing hapus RT
Route::get('hapus/rt/{id}', 'DataRtController@hapusRt');
Route::get('hapus/kk/{id}', 'DataKkController@hapusKk');
Route::get('hapus/k/{id}', 'KeluargaController@hapusK');

/*
    ROUTE DETAIL WARGA
*/
Route::get('/rt/{id}', [DataRtController::class, 'showRtDetail'])->name('rt.detail');
Route::get('/kk/{id}', [DataKkController::class, 'showKkDetail'])->name('kk.detail');
Route::get('/k/{id}', [KeluargaController::class, 'showKkDetail'])->name('k.detail');

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
