<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\AdminMenuController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminTransactionController;

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
    Route::get('/forgot-password', [ForgotPasswordController::class, 'forgotPasswordIndex'])->name('password.request');
    Route::post('/forgot-password', [ForgotPasswordController::class, 'forgotPasswordStore'])->name('password.email');
    Route::get('/reset-password/{token}', [ForgotPasswordController::class, 'resetPasswordIndex'])->name('password.reset');
    Route::post('/reset-password', [ForgotPasswordController::class, 'resetPasswordStore'])->name('password.update');
});


// Route untuk melakukan verifikasi email
Route::middleware(['auth'])->group(function() {
    Route::get('/email/verify', [VerifyEmailController::class, 'verifyIndex'])->name('verification.notice');
    Route::get('/email/verify/{id}/{hash}', [VerifyEmailController::class, 'verifyEmail'])->middleware(['signed'])->name('verification.verify');
    Route::post('/email/verification-notification', [VerifyEmailController::class, 'resendEmail'])->middleware(['throttle:6,1'])->name('verification.send');
    Route::post('/email/verify/logout', [LoginController::class, 'logout'])->name('email.logout');
});

// Route untuk user dengan Role 'User' yang telah terautentikasi
Route::middleware(['auth', 'rolecheck:User', 'verified'])->group(function() {
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
    Route::put('admin/menu/disable/{id_menu}', [AdminMenuController::class, 'disableMenu'])->name('admin.menu-disable');
    Route::put('admin/menu/enable/{id_menu}', [AdminMenuController::class, 'enableMenu'])->name('admin.menu-enable');
    Route::get('admin/transactions', [AdminTransactionController::class, 'index'])->name('admin.transactions');
    Route::put('admin/transactions/deliver-order/{id}', [AdminTransactionController::class, 'deliverOrder'])->name('admin.transactions-deliver');
    Route::put('admin/transactions/complete-order/{id}', [AdminTransactionController::class, 'completeOrder'])->name('admin.transactions-complete');
    Route::post('admin/logout', [LoginController::class, 'logout'])->name('logout.admin');
});