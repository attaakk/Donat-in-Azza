<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\StoreController;

Route::get('/', [StoreController::class, 'index'])->name('home');

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    
    // Admin Routes
    Route::middleware('can:admin')->prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
        
        // Menus
        Route::post('/menus', [AdminController::class, 'storeMenu'])->name('menus.store');
        Route::delete('/menus/{id}', [AdminController::class, 'destroyMenu'])->name('menus.destroy');
        
        // Orders
        Route::put('/orders/{id}/status', [AdminController::class, 'updateOrderStatus'])->name('orders.updateStatus');
        Route::delete('/orders/{id}', [AdminController::class, 'destroyOrder'])->name('orders.destroy');
    });

    // Customer Routes
    Route::prefix('customer')->name('customer.')->group(function () {
        Route::get('/dashboard', [CustomerController::class, 'index'])->name('dashboard');
        Route::post('/profile', [CustomerController::class, 'updateProfile'])->name('profile.update');
        Route::post('/password', [CustomerController::class, 'updatePassword'])->name('password.update');
        
        // Order
        Route::post('/order', [StoreController::class, 'placeOrder'])->name('order.place');
    });
});
