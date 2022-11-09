<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AbsenController;

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
Route::middleware(['guest'])->group(function () {
    Route::get('/login', function () {
        return view('auth.pegawai');
    })->name('login');
    Route::post('/loginPegawai', [UserController::class, 'loginPegawai'])->name('login-pegawai');

    Route::get('/loginAdmin', function () {
        return view('auth.admin');
    })->name('login-admin');
    Route::post('/loginAdmin', [UserController::class, 'loginAdmin'])->name('login-admin');
});

//Route::get('/login', view('auth.pegawai'));

Route::middleware(['auth:pegawai', 'can:pegawai'])->group(function () {
    Route::get('/absenMasuk', [\App\Http\Controllers\AbsenController::class, 'index']);
    Route::post('/absenMasuk', [\App\Http\Controllers\AbsenController::class, 'store']);
});

Route::get('/home',function (){
   return redirect('/menu-admin');
});

Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/menu-admin', [\App\Http\Controllers\AdminController::class, 'index'])->name('menu-admin');
    Route::get('/logout-admin', [UserController::class, 'logoutAdmin'])->name('logout-admin');
//
    Route::get('rekap-data', [\App\Http\Controllers\AdminController::class, 'rekapData'])->name('rekap-data');
    Route::post('/rekap-data', [\App\Http\Controllers\AdminController::class, 'insertPegawai'])->name('insert-pegawai');
});

