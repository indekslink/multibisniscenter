<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReferalController;
use App\Http\Controllers\UserController;
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

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'postLogin'])->name('postLogin');
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'postRegister'])->name('postRegister');
});


Route::group(['middleware' => ['auth']], function () {

    Route::middleware('is_active')->group(function () {
        Route::get('/', [HomeController::class, 'index'])->name('home');
        Route::post('/users/{user:username}/activate', [UserController::class, 'activate'])->name('users.activate');
        Route::put('/users/{user:username}/update_autentikasi', [UserController::class, 'update_autentikasi'])->name('users.update.autentikasi');
        Route::resources([
            'users' => UserController::class,
            'referal' => ReferalController::class,
        ]);
    });
    Route::get('/transfer', [HomeController::class, 'transfer'])->name('transfer');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
