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

// Cart
Route::post('/carts', [App\Http\Controllers\CartController::class, 'store'])->middleware('auth')->name('carts.store');

Auth::routes();

Route::group([
    'prefix' => 'backends',
    'middleware' => 'auth'
], function() {
    Route::get('/', [App\Http\Controllers\Backends\DashboardController::class, 'index'])->name('backends.dashboard');

    Route::get('/users', [App\Http\Controllers\Backends\UserController::class, 'index'])->name('backends.users.index');
    Route::get('/users/create', [App\Http\Controllers\Backends\UserController::class, 'create'])->name('backends.users.create');
    Route::post('/users', [App\Http\Controllers\Backends\UserController::class, 'store'])->name('backends.users.store');

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

    Route::resource('products', App\Http\Controllers\Backends\ProductController::class, [
        'as' => 'backends'
    ]);
});