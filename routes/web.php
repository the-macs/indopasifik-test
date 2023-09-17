<?php

use App\Http\Controllers\KendaraanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PenitipanController;
use App\Http\Controllers\PenyewaanController;
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

Route::group(['middleware' => 'prevent.back.history'], function () {
    Route::get('/login', [LoginController::class, 'index'])->middleware('guest')->name('login');
    Route::post('/login', [LoginController::class, 'login'])->middleware('guest');


    Route::middleware(['auth'])->group(function () {
        Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

        Route::get('/', function () {
            return view('welcome');
        });

        Route::get('/user', [UserController::class, 'index']);
        Route::get('/kendaraan', [KendaraanController::class, 'index']);
        Route::get('/penitipan', [PenitipanController::class, 'index']);
        Route::get('/penyewaan', [PenyewaanController::class, 'index']);
    });
});
