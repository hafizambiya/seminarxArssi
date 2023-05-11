<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PesertaController;
use App\Http\Controllers\RegisteredController;

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
Route::resource('peserta', RegisteredController::class);
// Route::controller(LoginController::class)->group(function () {
//     Route::get('login', 'index')->name('login');
// });
Route::get('login', [LoginController::class, 'index']);
