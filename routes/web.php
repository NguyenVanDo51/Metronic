<?php

use App\Http\Controllers\PlaceHolderController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

//dd(app()->make('my-class'));

Route::view('channel', 'Test.channel');

Route::view('channel2', 'Test.channel2');

Route::get('pay', [\App\Http\Controllers\PaymentController::class, 'store'])->name('payment.store');

Route::get('placeholder', [PlaceHolderController::class, 'index'])->name('placeholder.index');

//Route::get('placeholder', [PlaceHolderController::class, 'show'])->name('placeholder.show');

Route::post('placeholder', [PlaceHolderController::class, 'store'])->name('placeholder.store');

Route::put('placeholder', [PlaceHolderController::class, 'update'])->name('placeholder.update');

Route::delete('placeholder/delete', [PlaceHolderController::class, 'destroy'])->name('placeholder.destroy');

Route::get('posts', [PostController::class, 'index'])->name('posts.index');

Route::get('posts/{id}', [PostController::class, 'show'])->name('posts.show');

Route::get('posts/{id}/delete', [PostController::class, 'destroy'])->name('posts.destroy');
