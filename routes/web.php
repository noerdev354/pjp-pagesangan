<?php

use Illuminate\Support\Facades\Auth;
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
    return view('welcome');
});

Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
Route::prefix('master-data')->group(function () {
    Route::prefix('data-kelompok-usia')->group(function () {
        Route::get('index', [App\Http\Controllers\MasterData\DataKelompokUsiaController::class, 'index'])->name('master_data.data_kelompok_usia.index');
        Route::post('create',  [App\Http\Controllers\MasterData\DataKelompokUsiaController::class, 'create'])->name('master_data.data_kelompok_usia.create');
        Route::delete('delete/{id}',  [App\Http\Controllers\MasterData\DataKelompokUsiaController::class, 'destroy'])->name('master_data.data_kelompok_usia.delete');
    });
    Route::prefix('data-kelas')->group(function () {
        Route::get('index', [App\Http\Controllers\MasterData\DataKelasController::class, 'index'])->name('master_data.data_kelas.index');
        Route::post('create',  [App\Http\Controllers\MasterData\DataKelasController::class, 'create'])->name('master_data.data_kelas.create');
        Route::delete('delete/{id}',  [App\Http\Controllers\MasterData\DataKelasController::class, 'destroy'])->name('master_data.data_kelas.delete');
    });
});
