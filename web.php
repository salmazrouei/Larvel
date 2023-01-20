<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;



Route::get('/', [HomeController::class, 'index']);

Route::get('/shop', [HomeController::class, 'shop']);

Route::get('/admin', [AdminController::class, 'admin']);

Route::get('/admin/categories', [AdminController::class, 'categories']);