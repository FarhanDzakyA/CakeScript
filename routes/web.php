<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\UserController;

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

Route::get('/login', [LoginController::class, 'index']) -> name('login') -> middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisteredUserController::class, 'index']) -> name('regist') -> middleware('guest');
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::get('/', [UserController::class, 'indexHome'])->middleware('auth');
Route::get('/menu', [UserController::class, 'indexMenu'])->name('menu')->middleware('auth');
Route::get('/about', [UserController::class, 'indexAbout'])->name('about')->middleware('auth');
Route::get('/contact', [UserController::class, 'indexContact'])->name('contact')->middleware('auth');
Route::post('/payment', [UserController::class, 'processPayment'])->middleware('auth');