<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminOrderController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\AdminUserController;
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

    // admin dashboard
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
        Route::resource('/product', AdminProductController::class);
        Route::resource('/user', AdminUserController::class);
        Route::resource('/order', AdminOrderController::class);
    });
});

require __DIR__.'/auth.php';
