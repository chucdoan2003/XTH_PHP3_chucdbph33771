<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentController;
use App\Http\Middleware\checkLoginMiddleware;
use App\Http\Middleware\checkTruongPhong;
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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/product/{id}',[HomeController::class, 'showdetailPr'])->name('product.show');
Route::get('/products',[HomeController::class, 'showAllPr'])->name('product.index');
Route::get('/products/category/{id}',[HomeController::class, 'prCate'])->name('product.cate');

Route::get('/carts', [CartController::class, 'listProduct'])->name('cart.list')->middleware(checkLoginMiddleware::class);
Route::post('/adcart', [CartController::class, 'addnewPr'])->name('cart.add')->middleware(checkLoginMiddleware::class);
Route::get('/cart/destroy/{id}', [CartController::class, 'destroyCart'])->name('cart.destroy');

//đơn hàng
Route::get('/orders',[OrderController::class,'index'])->name('orders.index')->middleware(checkLoginMiddleware::class);


//đăng ký đăng nhập
Route::get('/login',[LoginController::class, 'index'])->name('login');
Route::post('/login',[LoginController::class, 'store'])->name('login');

Route::get('/logout',[LoginController::class, 'logout'])->name('logout');

Route::get('/register',[RegisterController::class, 'index'])->name('register');
Route::post('/register',[RegisterController::class, 'store'])->name('register');

//Xác thực
Route::get('/auth/verify/{token}', [LoginController::class, 'verify'])->name('verify');


//thanh toán
Route::post('/muahang',[OrderController::class, 'muahang'])->name('muahang');
Route::post('/thanhtoan',[OrderController::class, 'thanhtoan'])->name('thanhtoan');
Route::get('/bill',[OrderController::class, 'bill'])->name('bill');


Route::get('/students', [StudentController::class, 'index']);