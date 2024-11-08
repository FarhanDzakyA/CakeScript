<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\LoginController;

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

Route::get('/', function () {
    $data = [
        'title' => "Home",
    ];

    return view('user.home', $data);
})->middleware('auth');

Route::get('/menu', function () {
    $data = [
        'title' => "Menu",
    ];

    return view('user.menu', $data);
})->name('menu')->middleware('auth');

Route::get('/about', function () {
    $data = [
        'title' => "About Us",
    ];

    return view('user.about_us', $data);
})->name('about')->middleware('auth');

Route::get('/contact', function () {
    $data = [
        'title' => "Contact",
    ];
    
    return view('user.contact', $data);
})->name('contact')->middleware('auth');