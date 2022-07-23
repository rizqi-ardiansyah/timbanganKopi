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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

// route with widleware auth & route resources
Route::middleware('auth')->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/laporan', [App\Http\Controllers\LaporanController::class, 'index'])->name('laporan');
    Route::get('laporan-data', [App\Http\Controllers\LaporanController::class, 'data'])->name('data-ex');
    Route::get('laporan-data-kopi', [App\Http\Controllers\LaporanController::class, 'dataKopi'])->name('kopi-ex');
    Route::get('laporan-data-pekerja', [App\Http\Controllers\LaporanController::class, 'dataPekerja'])->name('pekerja-ex');
    Route::get('list-pekerja', [App\Http\Controllers\PekerjaController::class, 'getPekerja'])->name('list-pekerja');
    Route::resources([
        // 'list-pekerja'   => App\Http\Controllers\ListController::class,
        'pekerja'   => App\Http\Controllers\PekerjaController::class,
        'kopi'      => App\Http\Controllers\KopiController::class,
    ]);
});

