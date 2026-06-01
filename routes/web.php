<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\CartController;

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/register', [RegisterController::class, 'showRegister'])
    ->name('register');

Route::post('/register', [RegisterController::class, 'register'])
    ->name('register.process');

Route::get('/login', [LoginController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [LoginController::class, 'login'])
    ->name('login.process');

Route::post('/logout', [LoginController::class, 'logout'])
    ->name('logout');

Route::middleware('check.login')->group(function () {

    Route::get('/dashboard', [UserDashboardController::class, 'index'])
        ->name('dashboard');

    Route::get('/products', [ProductController::class, 'index'])
        ->name('products.index');

    Route::get('/cart', [CartController::class, 'index'])
        ->name('cart.index');

    Route::post('/cart/add/{product_id}', [CartController::class, 'store'])
        ->name('cart.add');

    Route::get('/checkout', [CartController::class, 'checkout'])
        ->name('checkout');

    Route::post('/checkout', [CartController::class, 'processCheckout'])
        ->name('checkout.process');

    Route::get('/my-orders', [CartController::class, 'orderHistory'])
        ->name('orders.history');
});

Route::middleware(['check.login', 'check.admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/dashboard', [DashboardController::class, 'index'])
            ->name('dashboard');

        Route::resource('products', AdminProductController::class);

        Route::get('/orders', [OrderController::class, 'index'])
            ->name('orders.index');

        Route::patch('/orders/{order}/status', [OrderController::class, 'updateStatus'])
            ->name('orders.update-status');

        Route::get('/users', [UserController::class, 'index'])
            ->name('users.index');
    });