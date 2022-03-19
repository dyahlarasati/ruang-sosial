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

// Route::get('/', function () {
//     return view('welcome');
// });

// ------------------PUBLIC-----------------
Route::get('/', 'Donasi\HomeController@index')->name('home');
Route::resource('tunawisma', 'TunawismaController');
Route::post('/detail-tunawisma', 'TunawismaController@detailTunawisma')
    ->name('detail-tunawisma');
// Route::post('/detail-tunawisma/detail/{id}', 'DetailTunawismaController@detail')
// ->name('detail-tunawisma-detail');
// Route::get('/info-tunawisma/{id}', 'TunawismaController@gettunawisma')->name('info-tunawisma');
Route::get('/settings/{id}', 'SettingsController@settings')
    ->name('settings');
Route::post('/update-settings/{id}', 'SettingsController@updateSettings')
    ->name('update-settings');


// ------------------DONATUR-----------------
Route::middleware(['auth', 'user'])->group(
    function () {
        Route::resource('detail-donasi', 'Donasi\DetailDonasiController');
        Route::get('/detail-donatur/{id}', 'Donasi\DetailDonaturController@index')
        ->name('detail-donatur');
        Route::get('/konfirmasi-donasi/{id}', 'Donasi\KonfirmasiDonasiController@index')
        ->name('konfirmasi-donasi');
        Route::post('/konfirmasi-donasi/create/{id}', 'Donasi\KonfirmasiDonasiController@create')
        ->name('konfirmasi-donasi-create');
        Route::get('/konfirmasi-donasi/{id}/sukses-donasi', 'Donasi\KonfirmasiDonasiController@suksesDonasi')
        ->name('sukses-donasi');
        Route::get('/history-donasi', 'Donasi\HistoryDonasiController@index')
        ->name('history-donasi');

        Route::get('/kegiatan', 'Kegiatan\KegiatanSosialController@index')->name('kegiatan');
        Route::get('/partisipasi-kegiatan/{id}', 'Kegiatan\PartisipasiKegiatanController@index')->name('partisipasi-kegiatan');
        Route::post('/partisipasi-kegiatan/create/{id}', 'Kegiatan\PartisipasiKegiatanController@create')
        ->name('partisipasi-kegiatan-create');
        Route::get('/partisipasi-kegiatan/{id}/sukses-partisipasi', 'Kegiatan\PartisipasiKegiatanController@suksesPartisipasi')
        ->name('sukses-partisipasi');
        Route::get('/history-kegiatan', 'Kegiatan\HistoryKegiatanController@index')
        ->name('history-kegiatan');

    });

    // ------------------ADMIN-----------------
Route::prefix('Admin-Rs')->namespace('Admin')->middleware(['auth', 'admin'])->group( function () {
            Route::get('/', 'DashboardController@index')->name('dashboard');

            // ------------------Master Data Donasi-----------------
    Route::resource('data-user', 'DataUserController');
    Route::resource('data-aktivitas', 'DataAktivitasController');
    Route::resource('data-tempat-donasi', 'DataTempatDonasiController');

    // ------------------DONASI-----------------
    Route::get('/donasi-masuk', 'DonasiMasukController@index')
    ->name('donasi-masuk');
    Route::get('/donasi-masuk/{id}/verifikasi-uang', 'DonasiMasukController@verifikasiuang')
    ->name('verifikasi-uang');
    Route::post('/donasi-masuk/{id}/verifikasi-uang', 'DonasiMasukController@verifikasiuangcreate')
    ->name('verifikasi-uangcreate');
    Route::get('/data-uang-donasi', 'DataUangDonasiController@index')
    ->name('data-uang-donasi');

    // ------------------MASTER DATA KEGIATAN-----------------
    Route::resource('data-kegiatan', 'DataKegiatanController');
    Route::resource('data-tempat-kegiatan', 'DataTempatKegiatanController');

    // ------------------KEGIATAN-----------------
    Route::get('/kegiatan-masuk', 'KegiatanMasukController@index')
    ->name('kegiatan-masuk');
    Route::get('/data-kegiatan-masuk', 'DataKegiatanMasukController@index')
    ->name('data-kegiatan-masuk');
    Route::get('/kegiatan_masuk/{id}/verifikasi-parti', 'KegiatanMasukController@verifikasiparti')
    ->name('verifikasi-parti');
    Route::post('/kegiatan_masuk/{id}/verifikasi-parti', 'KegiatanMasukController@verifikasiparticreate')
    ->name('verifikasi-particreate');

    Route::get('/laporan-aktivitas-donasi', 'LapAktivitasDonasiController@index')
    ->name('laporan-aktivitas-donasi');

    Route::get('/laporan-tunawisma', 'LapTunawismaController@index')
    ->name('laporan-tunawisma');


    // ------------------EXPORT-----------------
    Route::get('/export-pdf-aktivitas-donasi', 'LapAktivitasDonasiController@export')
    ->name('export-aktivitas-donasi-admin');
    Route::post('/export-aktivitas-donasi-panti', 'LapAktivitasDonasiController@exportPanti')
    ->name('print-aktivitas-donasi-panti-admin');

    Route::get('/export-pdf-tunawisma', 'LapTunawismaController@exportTunawisma')
    ->name('export-tunawisma-admin');
    Route::post('/export-tunawisma-panti', 'LapTunawismaController@exportTunawismaPanti')
    ->name('print-tunawisma-panti-admin');

    // ------------------TUNAWISMA-----------------
    Route::resource('data-tunawisma', 'DataTunawismaController');
    Route::resource('data-panti', 'DataPantiController');

    // ------------------EXPORT PDF-----------------



        });
Auth::routes();

