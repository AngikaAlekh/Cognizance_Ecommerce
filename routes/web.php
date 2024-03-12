<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;

Route::get('/', [App\Http\Controllers\Client\WelcomeController::class, 'index']);

Auth::routes();

Route::get('/shop', [App\Http\Controllers\Client\ShopController::class,'index'])->name('shop');

Route::middleware(['auth'])->group(function () {
    Route::get('/cart', [App\Http\Controllers\Client\CartController::class,'index'])->name('cart');
    Route::get('/cart/{id}/add', [App\Http\Controllers\Client\ShopController::class,'add_to_cart'])->name('shop.cart.add');
    Route::post('/cart/{user_id}/update', [App\Http\Controllers\Client\ShopController::class,'update_cart'])->name('shop.cart.update');
    Route::get('/cart/checkout', [App\Http\Controllers\Client\CartController::class, 'view_checkout'])->name('cart.checkout');
    Route::post('/address/create', [App\Http\Controllers\Client\AddressController::class, 'store'])->name('address.create');

    // payment part
    Route::get('/razorpay/{price}', [App\Http\Controllers\Payment\RazorpayController::class, 'index'])->name('razorpay.payment');
    Route::post('/order/store', [App\Http\Controllers\Client\OrderController::class, 'store'])->name('order.store');

});


// client section
Route::get('/categories', [App\Http\Controllers\client\CategoryController::class,'view_categories']);
Route::get('/category/{slug}', [App\Http\Controllers\Client\CategoryController::class,'index']);
Route::get('/category/{category_slug}/{course_slug}', [App\Http\Controllers\Client\CourseController::class,'index']);

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Admin all route
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
    Route::post('/product/update/{id}', [App\Http\Controllers\Admin\ProductController::class, 'update']);
    Route::get('/product/delete/{id}', [App\Http\Controllers\Admin\ProductController::class, 'destroy']);


    Route::get('/trash', [App\Http\Controllers\Admin\CategoryController::class, 'trash']);
    Route::get('/trash/restore/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'restore']);
    
    Route::get('/trash/delete/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'delete']);

    Route::get('/featured/categories', [App\Http\Controllers\Admin\FeaturedController::class, 'view_featured_categories']);
    Route::post('/featured/categories/store', [App\Http\Controllers\Admin\FeaturedController::class, 'store_featured_category']);
    Route::get('/featured/courses', [App\Http\Controllers\Admin\FeaturedController::class, 'view_featured_courses']);
    Route::get('/featured/categories/delete/{id}', [App\Http\Controllers\Admin\FeaturedController::class, 'remove_featured_category']);

    Route::get('/featured/products', [App\Http\Controllers\Admin\FeaturedController::class, 'view_featured_products']);
    Route::post('/featured/products/store', [App\Http\Controllers\Admin\FeaturedController::class, 'store_featured_product']);
    Route::get('/featured/courses', [App\Http\Controllers\Admin\FeaturedController::class, 'view_featured_courses']);
    Route::get('/featured/products/delete/{id}', [App\Http\Controllers\Admin\FeaturedController::class, 'remove_featured_product']);
    
});