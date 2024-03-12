<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/auth/login', [App\Http\Controllers\Api\UserAPIController::class, 'login']);

Route::group([
    'prefix' => 'categories',
    'middleware' => ['auth:sanctum']
], function() {
    Route::get('/', [App\Http\Controllers\Api\CategoryAPIController::class, 'index'])->name('api.categories.index');
    Route::post('/', [App\Http\Controllers\Api\CategoryAPIController::class, 'store'])->name('api.categories.store');
    Route::put('/{category}', [App\Http\Controllers\Api\CategoryAPIController::class, 'update'])->name('api.categories.update');
    Route::delete('/{category}', [App\Http\Controllers\Api\CategoryAPIController::class, 'destroy'])->name('api.categories.delete');
});

Route::group([
    'prefix' => 'products'
], function() {
    Route::get('/', [App\Http\Controllers\Api\ProductAPIController::class, 'index']);
    Route::post('/', [App\Http\Controllers\Api\ProductAPIController::class, 'store']);
    Route::put('/{product}', [App\Http\Controllers\Api\ProductAPIController::class, 'update']);
    Route::delete('/{product}', [App\Http\Controllers\Api\ProductAPIController::class, 'destroy']);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
