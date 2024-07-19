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

Route::get('/',[categoryController::class,'index']);
Route::get('/category',[categoryController::class,'index']);
Route::get('/allcategory',[categoryController::class,'categories']);
Route::get('/product',[productsController::class,'index']);
Route::get('/product/{catid?}',[productsController::class,'show']);
Route::get('/single',function(){return view('singleproduct');});
Route::get('/single/{prid?}',[categoryController::class,'pro_cat']);
Route::get('/cart/{id?}',[productsController::class,'cart_pro']);   
Route::get('/contactus',function(){return view('contact');});
Route::get('/aboutus',function(){return view('about');});
Route::get('/error404',function(){return view('error');});
Route::resource('customers',customerController::class);
Route::resource('contacts',contactController::class);
Route::resource('products',productsController::class);
Route::resource('category',categoryController::class);
Route::get('/set/{id?}',[SessionController::class,'StoreSession']);
Route::get('/get',[SessionController::class,'ViewSession']);
Route::get('/checkout', [SessionController::class, 'CheckoutSession']);
Route::post('/customer',[SessionController::class,'store'])->name('/customer');
Route::get('/remove/{id}', [SessionController::class, 'RemoveSession'])->name('removeSession');

// for adminpannel
Route::get('/login',function(){return view('login');})->name('login');
Route::POST('login1',[AdminController::class,'adminlogin'])->name('adminlogin');
Route::middleware(['auth'])->group(function () {

    Route::get('/admin',[customerController::class,'indash']);
    Route::get('/messages',[contactController::class,'index']);
    Route::delete('/messages/{id}',[contactController::class,'destroy'])->name('messages.destroy');
    Route::delete('/orders/{id}',[customerController::class,'destroy'])->name('orders.destroy');
    Route::get('/orders',[customerController::class,'index']);
    Route::get('/categories',[categoryController::class,'allcates']);
    Route::delete('/categories/{id}',[categoryController::class,'destroy'])->name('categories.destroy');
    Route::get('/allproducts',[productsController::class,'allprods']);
    Route::delete('/products/{id}',[productsController::class,'destroy'])->name('products.destroy');
    Route::post('/editprofile',[AdminController::class,'edit'])->name('profile.edit');
    Route::get('/profile',[AdminController::class,'index']);
    Route::get('/addpro',[productsController::class,'create']);
    Route::get('/addcat',[categoryController::class,'create']);
    Route::post('/logout', [AdminController::class, 'logout'])->name('logout');
    
});