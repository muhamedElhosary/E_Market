<?php

use App\Http\Controllers\categoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\productsController;
use App\Http\Controllers\customerController;
use App\Http\Controllers\contactController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SessionController;

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

Route::get('/', [categoryController::class, 'index']);
Route::get('/allcategory', [categoryController::class, 'categories']);
Route::get('/single', function () {
    return view('singleproduct');
});
Route::get('/single/{prid?}', [categoryController::class, 'pro_cat']);
Route::get('/cart/{id?}', [productsController::class, 'cart_pro']);
Route::get('/contactus', function () {
    return view('contact');
});
Route::get('/aboutus', function () {
    return view('about');
});
Route::get('/error404', function () {
    return view('error');
});
Route::resource('customers', customerController::class);
Route::resource('contacts', contactController::class);
Route::resource('products', productsController::class);
Route::resource('category', categoryController::class);
Route::get('/set/{id?}', [SessionController::class, 'StoreSession']);
Route::get('/get', [SessionController::class, 'ViewSession']);
Route::get('/checkout', [SessionController::class, 'CheckoutSession']);
Route::post('/customer', [SessionController::class, 'store'])->name('/customer');
Route::get('/remove/{id}', [SessionController::class, 'RemoveSession'])->name('removeSession');

//admin_pannel
Route::get('/login', function () {
    return view('login');
    })->name('login');
Route::POST('login1', [AdminController::class, 'adminlogin'])->name('adminlogin');
Route::middleware(['auth'])->group(function () {

    Route::get('/admin', [customerController::class, 'indash']);
    Route::resource('messages', contactController::class);
    Route::resource('orders', customerController::class);
    Route::resource('category', categoryController::class);
    Route::resource('product', productsController::class);
    Route::resource('admin', AdminController::class);
    Route::get('/categories', [categoryController::class, 'allcates']);
    Route::get('/allproducts', [productsController::class, 'allprods']);
    Route::post('/logout', [AdminController::class, 'logout'])->name('logout');
});
