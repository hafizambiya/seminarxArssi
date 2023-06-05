<?php

use App\Models\peserta;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Password;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Admin;
use Illuminate\Auth\Events\PasswordReset;
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

// Route::get('/', function () {
//     return view('welcome');
// })->name('welcome');

Route::redirect('/', '/login');

Route::resource('registrasi', PesertaController::class);

Route::group(['middleware' => ['auth']], function () {
    Route::group(['middleware' => ['CekPeserta:user']], function () {
        Route::resource('peserta', RegisteredController::class);
    });
    Route::group(['middleware' => ['CekPeserta:admin']], function () {
        // Route::resource('peserta', RegisteredController::class);
        Route::resource('admin', Admin::class);
        Route::get('admin/{id}', [PesertaController::class, 'edit']);
    });
});

// Route::resource('peserta', RegisteredController::class)->middleware('auth');
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
// Route::get('/invoice', [OrderController::class, 'invoice']);
Route::get('/forgot-password', function () {
    return view('main.forgot-password');
})->middleware('guest')->name('password.request');

Route::post('/forgot-password', function (Request $request) {
    $request->validate(['email' => 'required|email']);

    $status = Password::sendResetLink(
        $request->only('email')
    );

    return $status === Password::RESET_LINK_SENT
        ? back()->with(['status' => __($status)])
        : back()->withErrors(['email' => __($status)]);
})->middleware('guest')->name('password.email');

Route::get('/reset-password/{token}', function (string $token) {
    return view('main.reset-password', ['token' => $token]);
})->middleware('guest')->name('password.reset');


Route::post('/reset-password', function (Request $request) {
    $request->validate([
        'token' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:5|confirmed',
    ]);

    $status = Password::reset(
        $request->only('email', 'password', 'password_confirmation', 'token'),
        function (peserta $user, string $password) {
            $user->forceFill([
                'password' => Hash::make($password)
            ])->setRememberToken(Str::random(60));

            $user->save();

            event(new PasswordReset($user));
        }
    );

    return $status === Password::PASSWORD_RESET
        ? redirect()->route('login')->with('status', __($status))
        : back()->withErrors(['email' => [__($status)]]);
})->middleware('guest')->name('password.update');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function () {
//     // Definisikan rute-rute khusus admin di sini
// });
