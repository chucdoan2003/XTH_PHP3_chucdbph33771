<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\VourcherController;
use App\Http\Middleware\checkAdminMiddleware;
use App\Models\Vourcher;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::prefix('admin')->as('admin.')->group(function(){
    Route::get('/',function(){
        return view('admin.home');
    })->name('home')->middleware(checkAdminMiddleware::class);
    Route::resource('categories', CategoryController::class)->middleware(checkAdminMiddleware::class);
    Route::resource('products', ProductController::class)->middleware(checkAdminMiddleware::class);
    Route::resource('banners', BannerController::class)->middleware(checkAdminMiddleware::class);
    Route::resource('vourchers', VourcherController::class)->middleware(checkAdminMiddleware::class);
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::put('/orders/status/{id}', [OrderController::class,'status'])->name('orders.status');
    Route::get('/print/{id}/invoice', [OrderController::class, 'print'])->name('print');
}); 