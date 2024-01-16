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

Route::group([
    'prefix' => 'backends'
], function() {
    Route::get('/', [App\Http\Controllers\Backends\DashboardController::class, 'index'])->name('backends.dashboard');

    Route::get('/users', [App\Http\Controllers\Backends\UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [App\Http\Controllers\Backends\UserController::class, 'create'])->name('users.create');
    Route::post('/users', [App\Http\Controllers\Backends\UserController::class, 'store'])->name('users.store');

    Route::group([
        'prefix' => 'categories'
    ], function() {
        Route::get('/', [App\Http\Controllers\Backends\CategoryController::class, 'index'])->name('backends.categories.index');
        Route::get('/create', [App\Http\Controllers\Backends\CategoryController::class, 'create'])->name('backends.categories.create');
        Route::post('/', [App\Http\Controllers\Backends\CategoryController::class, 'store'])->name('backends.categories.store');
        Route::get('/{category}/edit', [App\Http\Controllers\Backends\CategoryController::class, 'edit'])->name('backends.categories.edit');
        Route::put('/{category}', [App\Http\Controllers\Backends\CategoryController::class, 'update'])->name('backends.categories.update');
        Route::delete('/{category}', [App\Http\Controllers\Backends\CategoryController::class, 'destroy'])->name('backends.categories.delete');
    });
});