<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BotManController;
use App\Http\Controllers\AuthContronller;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\FlutterwaveController;
use App\Http\Controllers\ProductController;
use App\Models\Product;

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

// Route::get('/', function () {
//     return view('customer.index2');
// });


// Route::get('/', function () {
//     return view('mypernel.warisi');
// });


// Login and Registration
Route::group(['middleware'=>'alreadyLoggedIn'],function(){
    Route::get('login', [CustomAuthController::class, 'login'])->name('login');
    Route::get('registration', [CustomAuthController::class, 'registration'])->name('register');
    Route::get('registration-admin', [CustomAuthController::class, 'adminregistration']);
});

Route::group(['middleware'=>'guest'],function(){
    Route::post('/register-user', [CustomAuthController::class, 'registerUser'])->name('register-user');
    Route::post('/register-admin', [CustomAuthController::class, 'registerAdmin'])->name('register-admin');
    Route::post('/login-user', [CustomAuthController::class, 'loginUser'])->name('login-user');
    Route::get('/logout', [CustomAuthController::class, 'logout'])->name('logout');
});
Route::group(['middleware'=>'isLoggedIn'],function(){
    Route::get('/', [CustomAuthController::class, 'dashboard'])->name('dashboard');
    Route::get('/adminparnel', [CustomAuthController::class, 'admin'])->name('admin.parnel');

    
    //Categry controller 
    Route::get('/category', [CategoryController::class, 'index'])->name('category');
    Route::post('/add-category', [CategoryController::class, 'store'])->name('add-category');
    Route::get('/category/delete/{id}', [CategoryController::class, 'destroy'])->name('category.delete');

    // add item to cart
    
    Route::get('cart', [CartController::class, 'create'])->name('cart.add');
    Route::get('cart/delete/{id}', [CartController::class, 'destroy'])->name('cart.delete');
    Route::get('cart/buy/{id}', [CartController::class, 'show'])->name('cart.buy');

    // product controller
    Route::get('/product', [ProductController::class, 'index'])->name('product');
    Route::post('/add-product', [ProductController::class, 'store'])->name('add-product');
    Route::get('/view-product', [ProductController::class, 'viewProduct'])->name('view-product');

    // botmancontroller
    Route::match(['get', 'post'], '/botman', [BotManController::class, 'handle']);
    
    // flutterwavecontroller
    Route::POST('/pay', [FlutterwaveController::class, 'initialize'])->name('pay');
    // The callback url after a payment
    Route::get('/rave/callback', [FlutterwaveController::class, 'callback'])->name('callback');
});