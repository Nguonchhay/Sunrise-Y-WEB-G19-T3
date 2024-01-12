<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', [App\Http\Controllers\PageController::class, 'home'])->name('pages.home');
Route::get('/cart', [App\Http\Controllers\PageController::class, 'cart'])->name('pages.cart');
Route::get('/contact', [App\Http\Controllers\PageController::class, 'contact'])->name('pages.contact');

Auth::routes();

Route::get('/backends/users', [App\Http\Controllers\Backends\UserController::class, 'index'])->name('users.index');
Route::get('/backends/users/create', [App\Http\Controllers\Backends\UserController::class, 'create'])->name('users.create');
Route::post('/backends/users', [App\Http\Controllers\Backends\UserController::class, 'store'])->name('users.store');