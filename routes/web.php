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

Route::get('/login', [LoginController::class, 'index']) -> name('login') -> middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisteredUserController::class, 'index']) -> name('regist') -> middleware('guest');
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::get('/', [UserController::class, 'indexHome'])->middleware('auth');
Route::get('/menu', [UserController::class, 'indexMenu'])->name('menu')->middleware('auth');
Route::get('/about', [UserController::class, 'indexAbout'])->name('about')->middleware('auth');
Route::get('/contact', [UserController::class, 'indexContact'])->name('contact')->middleware('auth');
Route::get('/shopping-cart', [UserController::class, 'indexCart'])->name('cart');
Route::post('/checkout', [UserController::class, 'checkoutProcess'])->name('checkout');
Route::get('/orders', [UserController::class, 'indexOrder'])->name('orders');
Route::get('/order/{id}', [UserController::class, 'paymentSuccess'])->name('payment.success');

Route::get('admin/dashboard', [AdminDashboardController::class, 'index'])->middleware('auth');
Route::get('admin/menu', [AdminMenuController::class, 'index'])->name('admin.menu')->middleware('auth');
Route::get('admin/menu/add', [AdminMenuController::class, 'create'])->middleware('auth');
Route::post('admin/menu/store', [AdminMenuController::class, 'store'])->name('admin.menu-store')->middleware('auth');
Route::get('admin/menu/{id_menu}/edit', [AdminMenuController::class, 'edit'])->name('admin.edit')->middleware('auth');
Route::put('admin/menu/{id_menu}', [AdminMenuController::class, 'update'])->name('admin.update')->middleware('auth');
Route::delete('admin/menu/{id_menu}', [AdminMenuController::class, 'destroy'])->name('admin.destroy')->middleware('auth');