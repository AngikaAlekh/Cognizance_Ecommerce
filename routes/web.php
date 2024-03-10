<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('dashboard', [App\Http\Controllers\Admin\dashboardController::class, 'index']);
    Route::get('/categories', [App\Http\Controllers\Admin\CategoryController::class, 'index']);
    Route::get('/category/create', [App\Http\Controllers\Admin\CategoryController::class, 'create']);
    Route::post('/category/create', [App\Http\Controllers\Admin\CategoryController::class, 'store']);
    Route::get('/category/edit/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'edit']);
    Route::post('/category/update/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'update']);
    Route::get('/category/delete/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'destroy']);

    Route::get('/products', [App\Http\Controllers\Admin\ProductController::class, 'index']);
    Route::get('/product/create', [App\Http\Controllers\Admin\ProductController::class, 'create']);
    Route::post('/product/create', [App\Http\Controllers\Admin\ProductController::class, 'store']);
    Route::get('/product/edit/{id}', [App\Http\Controllers\Admin\ProductController::class, 'edit']);

    Route::get('/trash', [App\Http\Controllers\Admin\CategoryController::class, 'trash']);
    Route::get('/trash/restore/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'restore']);
    
    Route::get('/trash/delete/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'delete']);
    
});