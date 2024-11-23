<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\AdminMenuController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Admin\AdminDashboardController;

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

// Route untuk user yang belum terautentikasi
Route::middleware(['guest'])->group(function() {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'authenticate'])->name('login.process');
    Route::get('/register', [RegisteredUserController::class, 'index'])->name('regist');
    Route::post('/register', [RegisteredUserController::class, 'store'])->name('regist.store');
});

// Route untuk user dengan Role 'User' yang telah terautentikasi
Route::middleware(['auth', 'rolecheck:User'])->group(function() {
    Route::get('/', [UserController::class, 'indexHome'])->name('home');
    Route::get('/menu', [UserController::class, 'indexMenu'])->name('menu');
    Route::get('/about', [UserController::class, 'indexAbout'])->name('about');
    Route::get('/contact', [UserController::class, 'indexContact'])->name('contact');
    Route::get('/shopping-cart', [UserController::class, 'indexCart'])->name('cart');
    Route::post('/checkout', [UserController::class, 'checkoutProcess'])->name('checkout');
    Route::get('/orders', [UserController::class, 'indexOrder'])->name('orders');
    Route::get('/order/{id}', [UserController::class, 'paymentSuccess'])->name('payment.success');
    Route::delete('/order/{id}', [UserController::class, 'cancelOrder'])->name('cancel.order');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout.user');
});

// Route untuk user dengan Role 'Admin' yang telah terautentikasi
Route::middleware(['auth', 'rolecheck:Admin'])->group(function() {
    Route::get('admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('admin/menu', [AdminMenuController::class, 'index'])->name('admin.menu');
    Route::get('admin/menu/add', [AdminMenuController::class, 'create'])->name('admin.menu-add');
    Route::post('admin/menu/store', [AdminMenuController::class, 'store'])->name('admin.menu-store');
    Route::get('admin/menu/{id_menu}/edit', [AdminMenuController::class, 'edit'])->name('admin.menu-edit');
    Route::put('admin/menu/{id_menu}', [AdminMenuController::class, 'update'])->name('admin.menu-update');
    Route::delete('admin/menu/{id_menu}', [AdminMenuController::class, 'destroy'])->name('admin.menu-destroy');
    Route::post('admin/logout', [LoginController::class, 'logout'])->name('logout.admin');
});