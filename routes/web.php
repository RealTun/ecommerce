<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\web\WebController;
use App\Http\Controllers\web\AccountController;

Route::get('/login', [AccountController::class, 'index'])->name('web.login');

Route::get('/', [WebController::class, 'index'])->name('web.home');

Route::get('/{slug}', [WebController::class, 'brandIndex'])->name('web.brandIndex');

Route::get('/{slug}/{id}', [WebController::class, 'detailsProduct'])->name('web.detailsProduct');


// process cart
Route::post('/addToCart', [WebController::class, 'addToCart']);
Route:: post('/showItemCart', [WebController::class, 'showItemCart']);
Route::post('/deleteItemCart', [WebController::class, 'deleteItemCart']);

// admin
Route::prefix('admin')->group(function () {
    Route::prefix('manage')->group(function(){
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
