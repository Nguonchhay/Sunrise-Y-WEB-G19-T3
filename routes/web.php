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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/backends/users', [App\Http\Controllers\Backends\UserController::class, 'index'])->name('users.index');
Route::get('/backends/users/create', [App\Http\Controllers\Backends\UserController::class, 'create'])->name('users.create');
Route::post('/backends/users', [App\Http\Controllers\Backends\UserController::class, 'store'])->name('users.store');