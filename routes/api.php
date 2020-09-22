<?php

use App\Http\Controllers\Api\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Lay ds san pham
Route::get('products', [ProductController::class, 'index'])->name('products.index');

// Lay thong tin san pham theo id
Route::get('products/{product}', [ProductController::class, 'show'])->name('products.show');

// Them san pham moi
Route::post('products', [ProductController::class, 'store'])->name('products.store');

// Cap nhat thong tin san pham theo id
Route::put('products/{product}', [ProductController::class, 'update'])->name('products.update');

// Xoa san pham theo id
Route::delete('products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
