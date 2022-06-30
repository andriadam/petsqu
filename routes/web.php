<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminOrderController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Database\Seeders\AdminUserSeeder;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('beranda');
})->name('beranda');

Route::get('product', [ProductController::class, 'index']);

Route::middleware(['auth'])->group(function () {
    // user
    // dashboard
    Route::get('dashboard', [HomeController::class, 'dashboard'])->name('dashboard');

    Route::get('cart', [CartController::class, 'cartList'])->name('cart.list');
    Route::post('cart', [CartController::class, 'addToCart'])->name('cart.store');
    Route::post('update-cart', [CartController::class, 'updateCart'])->name('cart.update');
    Route::post('remove', [CartController::class, 'removeCart'])->name('cart.remove');

    Route::post('storeOrderFromCart', [CartController::class, 'storeOrderFromCart'])->name('order.store');

    // admin dashboard
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
        Route::resource('/product', AdminProductController::class);
        Route::resource('/user', AdminUserController::class);
        Route::resource('/order', AdminOrderController::class);
    });
});

require __DIR__.'/auth.php';
