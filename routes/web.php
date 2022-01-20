<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GoogleController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/profile', [ProfileController::class, 'index']);
Route::post('/profile', [ProfileController::class, 'update']);

Route::get('/login', [LoginController::class, 'index'])->middleware('guest');
Route::post('/login', [LoginController::class, 'login'])->middleware('guest');
Route::get('/login/google', [LoginController::class, 'google'])->name('login');
Route::get('/login/google/redirect', [LoginController::class, 'googleRedirect'])->name('redirect');
Route::get('/logout', [LoginController::class, 'logout'])->middleware('auth');

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'val'])->middleware('guest');

Route::get('/details/{id}', [ProductController::class, 'detail']);
Route::get('/update/{id}', [ProductController::class, 'update'])->middleware('auth');
Route::post('/update', [AdminController::class, 'update'])->middleware('auth');
Route::post('/search', [ProductController::class, 'search']);

Route::get('/deleteproduct', [ProductController::class, 'delete'])->middleware('auth');
Route::post('/delete', [AdminController::class, 'destroy'])->middleware('auth');

Route::get('/insert', [ProductController::class, 'insert'])->middleware('auth');
Route::post('/insert', [AdminController::class, 'insert'])->middleware('auth');

Route::post('/cart', [CartController::class, 'store'])->middleware('auth');
Route::get('/cart', [CartController::class, 'index'])->middleware('auth');
Route::post('/cartDelete', [CartController::class, 'delete'])->middleware('auth');

Route::get('/transaction', [TransactionController::class, 'index'])->middleware('auth');
Route::post('/transaction', [TransactionController::class, 'store'])->middleware('auth');
Route::post('/transactionDetail', [TransactionController::class, 'detail'])->middleware('auth');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');
Route::post('/userDelete', [AdminController::class, 'delete'])->middleware('auth');

