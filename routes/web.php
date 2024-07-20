<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\web\WebController;
use App\Http\Controllers\web\AccountController;
use App\Http\Controllers\web\ApiController;
use App\Http\Controllers\web\OrderController;

// RESTful API
Route::prefix('api')->group(function () {
  // V1
  Route::prefix('v1')->group(function () {
    // api/v1/products
    Route::prefix('products')->group(function () {
      Route::get('/', [ApiController::class, 'getProducts']);
      Route::get('/{id}', [ApiController::class, 'getProduct']);
    });

    Route::prefix('users')->group(function () {
      Route::get('/', [ApiController::class, 'getUsers']);
      Route::get('/{id}', [ApiController::class, 'getUser']);
    });
  });
});

Route::get('/login', [AccountController::class, 'login'])->name('web.login');
Route::get('/register', [AccountController::class, 'register'])->name('web.register');
Route::get('/account/logout', [AccountController::class, 'logout'])->name('web.logout');
Route::post('/account/store', [AccountController::class, 'storeAccount'])->name('web.storeAccount');
Route::post('/', [AccountController::class, 'checkLogin'])->name('web.checklogin');
Route::get('/account/forgot-password', [AccountController::class, 'forgotPassword'])->name('web.forgotpassword');
Route::get('/', [WebController::class, 'index'])->name('web.home');
Route::get('/contact', [WebController::class, 'contact'])->name('web.contact');
Route::post('/sendContact', [WebController::class, 'sendContact'])->name('web.sendContact');
Route::post('/sendMail', [WebController::class, 'sendMail'])->name('web.sendMail');

Route::get('/giay-dep/{slug}/page={pageNumber}', [WebController::class, 'brandProducts'])->name('web.brandProducts');
Route::get('/giay-dep/{slug}/{id}', [WebController::class, 'detailsProduct'])->name('web.detailsProduct');


// process cart
Route::middleware('auth')->group(function () {
  Route::post('/addToCart', [WebController::class, 'addToCart']);
  Route::get('/checkout', [WebController::class, 'showCheckout'])->name('showCheckout');
  // checkout & payment
  Route::post('/create-payment-link', [OrderController::class, 'createPaymentLink'])->name('web.createPayment');
  Route::prefix('/order')->group(function () {
    Route::post('/create', [OrderController::class, 'createOrder']);
    Route::get('/{id}', [OrderController::class, 'getPaymentLinkInfoOfOrder']);
    Route::put('/{id}', [OrderController::class, 'cancelPaymentLinkOfOrder']);
  });

  Route::prefix('/payment')->group(function () {
    Route::post('/payos', [OrderController::class, 'handlePayOSWebhook']);
  });
  
  Route::prefix('/account')->group(function () {
    // info
    Route::get('/change-info', [AccountController::class, 'viewUpdateInfo'])->name('web.account.view.updateinfo');
    Route::patch('/updateInfo', [AccountController::class, 'updateInfo'])->name('web.account.updateinfo');
    //change password
    Route::get('/change-password', [AccountController::class, 'viewChangePassword'])->name('web.account.view.changepassword');
    Route::patch('/updatePassword', [AccountController::class, 'updatePassword'])->name('web.account.updatePassword');
    //order
    Route::get('', [AccountController::class, 'index'])->name('web.account.index');
    Route::get('history', [AccountController::class, 'indexHistory'])->name('web.order.history');
    Route::get('order/{id}', [AccountController::class, 'indexOrder'])->name('web.order.detail');
  });
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
