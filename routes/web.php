<?php

use App\Http\Controllers\admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\admin\LoginController as AdminLoginController;
use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryContoller;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SearchProductController;
use App\Http\Controllers\ShoesController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');

});

Route::get('/', [ShoesController::class, 'index'])->name('home');
Route::get('/product/{id}', [ShoesController::class, 'show'])->name('shoe.show');

Route::get('/viewAllShoes', [SearchProductController::class, 'index'])->name('shoes.index');

Route::group(['prefix' => 'account'], function () {

    //Guest Middleware
    Route::group(['middleware' => 'guest'], function () {
        Route::get('login', [LoginController::class, 'index'])->name('account.login');
        Route::get('register', [LoginController::class, 'register'])->name('account.register');
        Route::post('process-register', [LoginController::class, 'processRegister'])->name('account.processRegister');
        Route::post('authenticate', [LoginController::class, 'authenticate'])->name('account.authenticate');
    });


    //Authenticated Middleware
    Route::group(['middleware' => 'auth'], function () {
        Route::get('logout', [LoginController::class, 'logout'])->name('account.logout');
        Route::get('dashboard', [DashboardController::class, 'index'])->name('account.dashboard');

        Route::get('cart/{cart}', [CartController::class, 'addToCart'])->name('addtocart');
        Route::get('cart', [CartController::class, 'index'])->name('list.cart');
        Route::put('/cart/{id}', [CartController::class, 'updateCart'])->name('update.cart');
        Route::delete('/cart/{id}', [CartController::class, 'destroy'])->name('destroy.cart');


    });
});

Route::group(['prefix' => 'admin'], function () {

    //Guest Middleware
    Route::group(['middleware' => 'admin.guest'], function () {
        Route::get('login', [AdminLoginController::class, 'index'])->name('admin.login');
        Route::post('authenticate', [AdminLoginController::class, 'authenticate'])->name('admin.authenticate');
    });


    //Authenticated Middleware
    Route::group(['middleware' => 'admin.auth'], function () {
        Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
        Route::get('logout', [AdminLoginController::class, 'logout'])->name('admin.logout');
    });

    // Route for category
    Route::get('/category', [CategoryContoller::class, 'index'])->name('category.index');
    Route::get('/category/create', [CategoryContoller::class, 'create'])->name('category.create');
    Route::post('/category/store', [CategoryContoller::class, 'store'])->name('category.store');
    Route::get('/category/{category}/edit', [CategoryContoller::class, 'edit'])->name('category.edit');
    Route::put('/category/{category}', [CategoryContoller::class, 'update'])->name('category.update');
    Route::delete('/category/{category}', [CategoryContoller::class, 'destroy'])->name('category.destroy');

    // Route for brnad
    Route::get('/brand', [BrandController::class, 'index'])->name('brand.index');
    Route::get('/brand/create', [BrandController::class, 'create'])->name('brand.create');
    Route::post('/brand/store', [BrandController::class, 'store'])->name('brand.store');
    Route::get('/brand/{brand}/edit', [BrandController::class, 'edit'])->name('brand.edit');
    Route::put('/brand/{brand}', [BrandController::class, 'update'])->name('brand.update');
    Route::delete('/brand/{brand}', [BrandController::class, 'destroy'])->name('brand.destroy');

    // Route for product
    Route::get('/product', [ProductController::class, 'index'])->name('product.index');
    Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
    Route::post('/product/store', [ProductController::class, 'store'])->name('product.store');
    Route::get('/product/{product}/edit', [ProductController::class, 'edit'])->name('product.edit');
    Route::put('/product/{product}', [ProductController::class, 'update'])->name('product.update');
    Route::delete('/product/{product}', [ProductController::class, 'destroy'])->name('product.destroy');

    // Route for profile update
    Route::get('profile/edit', [AdminProfileController::class, 'edit'])->name('profile.edit');
    Route::put('profile/update', [AdminProfileController::class, 'update'])->name('profile.update');
});
