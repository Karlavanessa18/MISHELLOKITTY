<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ProductController::class, 'index'])->name('store.index');
Route::get('/productos/{product:slug}', [ProductController::class, 'show'])->name('products.show');
