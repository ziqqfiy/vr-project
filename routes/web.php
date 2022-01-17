<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameplayController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\ProfileController;
use App\Http\Controllers\Auth\QRloginController;
use App\Http\Controllers\Auth\RegisterController;

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

/*AUTH*/

Route::get('/register', [ RegisterController::class, 'index' ])->name('register');
Route::post('/register', [ RegisterController::class, 'store' ])->name('register-store');

Route::get('/login', [ LoginController::class, 'index' ])->name('login');
Route::post('/login', [ LoginController::class, 'store' ])->name('login-store');

Route::get('/qrlogin', [ QRloginController::class, 'index' ])->name('qr-login');

Route::post('/logout', [ LogoutController::class, 'store' ])->name('logout');

//Dashboard
Route::get('/dashboard', [ DashboardController::class, 'index' ])->name('dashboard')->middleware('auth');

//User profile
Route::get('/profile', [ ProfileController::class, 'index' ])->name('profile')->middleware('auth');
Route::put('/profile', [ ProfileController::class, 'update' ])->name('profile-update')->middleware('auth');

//Gameplay
Route::get('/gameplay', [ GameplayController::class, 'index' ])->name('gameplay')->middleware('auth');