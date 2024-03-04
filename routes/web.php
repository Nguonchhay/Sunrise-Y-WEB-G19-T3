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
Route::get('/contact', [App\Http\Controllers\PageController::class, 'contact'])->name('pages.contact');

Route::group([
    'middleware' => 'auth'
], function() {
    // Cart
    Route::get('/carts', [App\Http\Controllers\CartController::class, 'index'])->name('carts.index');
    Route::put('/carts/qty/{cart}', [App\Http\Controllers\CartController::class, 'updateQuantity'])->name('carts.update.qty');
    Route::post('/carts/{product}', [App\Http\Controllers\CartController::class, 'store'])->name('carts.store');
    Route::delete('/carts/{cart}', [App\Http\Controllers\CartController::class, 'destroy'])->name('carts.destroy');

    // Order
    Route::post('/orders', [App\Http\Controllers\OrderController::class, 'store'])->name('orders.store');
});

Auth::routes();

Route::group([
    'prefix' => 'backends',
    'middleware' => ['auth']
], function() {
    Route::get('/', [App\Http\Controllers\Backends\DashboardController::class, 'index'])->name('backends.dashboard');

    Route::get('/users', [App\Http\Controllers\Backends\UserController::class, 'index'])->name('backends.users.index');

    Route::resource('products', App\Http\Controllers\Backends\ProductController::class, [
        'as' => 'backends'
    ]);

    Route::group([
        'middleware' => ['backend']
    ], function() {
        Route::get('/users/create', [App\Http\Controllers\Backends\UserController::class, 'create'])->name('backends.users.create');
        Route::post('/users', [App\Http\Controllers\Backends\UserController::class, 'store'])->name('backends.users.store');
        Route::get('/users/{user}/edit', [App\Http\Controllers\Backends\UserController::class, 'create'])->name('backends.users.edit');
        Route::put('/users/{user}', [App\Http\Controllers\Backends\UserController::class, 'create'])->name('backends.users.update');
        Route::delete('/users/{user}', [App\Http\Controllers\Backends\UserController::class, 'create'])->name('backends.users.delete');

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
});