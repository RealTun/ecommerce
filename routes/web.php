<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\web\WebController;
use App\Http\Controllers\web\AccountController;

Route::get('/login', [AccountController::class, 'login'])->name('web.login');
Route::get('/register', [AccountController::class, 'register'])->name('web.register');
Route::get('/account/logout', [AccountController::class, 'logout'])->name('web.logout');
Route::post('/account/store', [AccountController::class, 'storeAccount'])->name('web.storeAccount');
Route::post('/', [AccountController::class, 'checkLogin'])->name('web.checklogin');
Route::get('/account/forgot-password', [AccountController::class, ''])->name('web.forgotpassword');
Route::get('/', [WebController::class, 'index'])->name('web.home');
Route::get('/contact', [WebController::class, 'contact'])->name('web.contact');
Route::post('/sendContact', [WebController::class, 'sendContact'])->name('web.sendContact');
Route::post('/sendMail', [WebController::class, 'sendMail'])->name('web.sendMail');

Route::get('/thoi-trang/{slug}', [WebController::class, 'brandIndex'])->name('web.brandIndex');
Route::get('/thoi-trang/{slug}/{id}', [WebController::class, 'detailsProduct'])->name('web.detailsProduct');


// process cart
Route::middleware('auth')->group(function () {
  Route::post('/addToCart', [WebController::class, 'addToCart']);
  Route::post('/checkout', [WebController::class, 'showCheckout'])->name('showCheckout');
});
Route::post('/deleteItemCart', [WebController::class, 'deleteItemCart']);
Route::post('/showItemCart', [WebController::class, 'showItemCart']);

// admin
Route::prefix('admin')->group(function () {
  Route::prefix('manage')->group(function () {
    Route::get('logout', [AuthController::class, 'logout'])->name('admin.auth.logout');

    Route::get('dashboard', [HomeController::class, 'index'])->name('admin.home.index');

    Route::prefix('products')->group(function () {
      Route::get('/', [ProductController::class, 'index'])->name('admin.products.index');
      Route::get('create', [ProductController::class, 'create'])->name('admin.products.create');
      Route::post('store', [ProductController::class, 'store'])->name('admin.products.store');
      Route::get('edit/{id}', [ProductController::class, 'edit'])->name('admin.products.edit');
      Route::put('update/{id}', [ProductController::class, 'update'])->name('admin.products.update');
      Route::get('delete/{id}', [ProductController::class, 'delete'])->name('admin.products.delete');
    });
  });
});
