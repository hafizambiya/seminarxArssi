<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PesertaController;
use App\Http\Controllers\RegisteredController;
use App\Http\Controllers\OrderController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('registrasi', PesertaController::class);
Route::resource('peserta', RegisteredController::class)->middleware('auth');
// Route::controller(LoginController::class)->group(function () {
//     Route::get('login', 'index')->name('login');
// });
// Route::get('login', [LoginController::class, 'index']);

Route::controller(LoginController::class)->group(function () {
    Route::get('login', 'index')->name('login');
    Route::post('login/proses', 'proses');
    Route::get('logout', 'logout');
});

Route::post('/registrasi_proses', [PesertaController::class, 'registrasi_proses']);

Route::post('/checkout', [OrderController::class, 'checkout']);
// Route::post('/midtrans-callback', [OrderController::class, 'callback']);
