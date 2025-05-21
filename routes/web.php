<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\LoginUserController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;

Route::get('/', function () {
    return view('home');
});

Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store'])->name('register');

Route::get('/login', [LoginUserController::class, 'create'])->name('login');
Route::post('/login', [LoginUserController::class, 'store'])->name('login');

Route::post('/logout', [LoginUserController::class, 'destroy'])->name('logout');

Route::middleware([AdminMiddleware::class])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    });

    Route::resource('/products', ProductController::class)->except(['index','show']);
});


Route::get('products/{product}', [ProductController::class, 'show'])
     ->whereNumber('product')      
     ->name('products.show');


Route::get('products/{group?}/{category?}', [ProductController::class,'index'])->name('products.index');


//Za cart
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add', [CartController::class, 'add_to_cart'])->name('cart.add');
Route::put('cart/increase-quantity/{rowId}',[CartController::class, 'increase_cart_quantity'])->name('cart.qty.increase');
Route::put('cart/decrease-quantity/{rowId}',[CartController::class, 'decrease_cart_quantity'])->name('cart.qty.decrease');
Route::delete('cart/remove/{rowId}',[CartController::class, 'remove_item'])->name('cart.remove');

Route::get('/checkout', [CartController::class, 'showCheckoutPage'])->name('products.checkout');

Route::post('/checkout/plac-order', [OrderController::class, 'placeOrder'])->name('checkout.placeOrder');

Route::get('/order-success', function () {
    return view('products.success'); // We'll create this view next
})->name('order.success');
