<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GameplayController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CustomAuthController;
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

Route::get('/registration', [CustomAuthController::class, 'registration'])->name('registration');
Route::post('/registration', [CustomAuthController::class, 'registerUser'])->name('register-user');

Route::get('/login', [CustomAuthController::class, 'login'])->name('login')->middleware('alreadyLoggedIn');
Route::post('/login', [CustomAuthController::class, 'loginUser'])->name('login-user');
Route::post('/logout', [CustomAuthController::class, 'logout'])->name('logout');

Route::get('/qrlogin', [ QRloginController::class, 'index' ])->name('qr-login');

//Dashboard
Route::get('/dashboard', [ DashboardController::class, 'index' ])->name('dashboard')->middleware('isLoggedIn');

//User profile
Route::get('/profile', [UserController::class, 'profile'])->name('profile')->middleware('isLoggedIn');
Route::post('/profile', [UserController::class, 'editProfile'])->name('profile-edit');

//Gameplay
Route::get('/gameplay', [ GameplayController::class, 'index' ])->name('gameplay')->middleware('isLoggedIn');

// Route::get('/dashboard', [GoalController::class, 'view'])->name('view-goal')->middleware('isLoggedIn');
// Route::post('/dashboard', [GoalController::class, 'create'])->name('add-goal')->middleware('isLoggedIn');