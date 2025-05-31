<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\CartController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SearchController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home');


// Products
Route::get('/products', [ProductController::class, 'index'])->name('products');

Route::get('/category/{slug}', [ProductController::class, 'showByCategory'])->name('category');

Route::get('/product/{slug}', [ProductController::class, 'detail'])->name('products.detail');


Route::get('/cart', [CartController::class, 'index'])->name('cart');

// Cart Routes
Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');
Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update');
Route::post('/cart/remove', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');

// Checkout Routes
Route::get('/checkout', [CheckoutController::class, 'show'])->name('checkout')->middleware(['auth']);
Route::post('/checkout/process', [CheckoutController::class, 'process'])->name('checkout.process')->middleware(['auth']);
Route::get('/checkout/success/{orderId}', [CheckoutController::class, 'success'])->name('checkout.success')->middleware(['auth']);

// User Profile Route
Route::get('/profile', [ProfileController::class, 'index'])->middleware(['auth'])->name('profile');

// Admin routes
Route::middleware(['auth', 'admin'])->group(function () {
    // Product Routes
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');
    Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');

    // Category Routes
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');
});

Route::get('/search', [SearchController::class, 'search'])->name('search');

require __DIR__.'/auth.php';
