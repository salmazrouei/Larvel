<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;



Route::get('/', [HomeController::class, 'index']);
Route::get('/add-product', [HomeController::class, 'add_product']);
Route::get('/shop', [HomeController::class, 'shop']);
Route::get('/contact',[ContactController::class,'index'])->name('contact');
Route::post('/contact',[ContactController::class,'sendMessage']);
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('/admin')->group(function () {
    Route::resource('', AdminController::class);
    Route::resource('products', ProductsController::class);
    Route::resource('categories', CategoriesController::class);
});

Route::get('/cart', [CartController::class, 'index']);
Route::get('/incQuantity', [CartController::class,'incQuantity']);
Route::get('/decQuantity', [CartController::class,'decQuantity']);
Route::get('/removeProduct', [CartController::class,'deleteProduct']);
