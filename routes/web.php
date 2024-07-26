<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MainController;

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


Route::get('/', [MainController::class, 'index'])->name('home');
Route::get('/login', [AuthController::class, 'loginPage'])->name('loginPage');
Route::post('/login/auth', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'registerPage'])->name('registerPage');
Route::post('/register/auth', [AuthController::class, 'register'])->name('register');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/forget-password', [AuthController::class, 'forgetPasswordPage'])->name('forgetPasswordPage');
Route::post('/forget-password/auth', [AuthController::class, 'forgetPassword'])->name('forgetPassword');
Route::get('/dashboard', [MainController::class, 'dashboard'])->name('dashboard');
Route::get('/katalog', [MainController::class, 'katalog'])->name('katalog');
Route::post('/katalog/add', [MainController::class, 'createKatalog'])->name('addKatalog');
Route::post('/katalog/update/{id}', [MainController::class, 'updateKatalog'])->name('updateKatalog');
Route::get('/katalog/delete/{id}', [MainController::class, 'deleteKatalog'])->name('deleteKatalog');
Route::get('/pesanan', [MainController::class, 'pesanan'])->name('pesanan');
Route::post('/update-status/{id}', [MainController::class, 'updateStatus']);
Route::get('/laporan', [MainController::class, 'laporanPage'])->name('laporan');
