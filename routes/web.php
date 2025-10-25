<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WebController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

Route::get('/', [WebController::class, 'index'])->name('top');

Route::get('/lang/{locale}', function ($locale) {
    if (!in_array($locale, ['en', 'ja'])) {
        abort(400);
    }
    Session::put('locale', $locale);
    App::setLocale($locale);
    return redirect()->back();
})->name('lang.switch');

require __DIR__.'/auth.php';

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('products', ProductController::class);

    Route::post('reviews', [ReviewController::class, 'store'])->name('reviews.store');

    Route::controller(FavoriteController::class)->group(function () {
        Route::post('favorites/{product_id}', 'store')->name('favorites.store');
        Route::delete('favorites/{product_id}', 'destroy')->name('favorites.destroy');
    });

    Route::controller(UserController::class)->group(function () {
        Route::get('users/mypage', 'mypage')->name('mypage');
        Route::get('users/mypage/edit', 'edit')->name('mypage.edit');
        Route::put('users/mypage', 'update')->name('mypage.update');
        Route::get('users/mypage/password/edit', 'edit_password')->name('mypage.edit_password');
        Route::put('users/mypage/password', 'update_password')->name('mypage.update_password');
        Route::get('users/mypage/favorite', 'favorite')->name('mypage.favorite');
        Route::get('users/mypage/orders', 'orderHistory')->name('mypage.orders');
        Route::get('users/mypage/orders/{order}', 'orderDetail')->name('mypage.order_detail');
    });

    Route::controller(CartController::class)->group(function () {
        Route::post('/cart/add/{id}', 'add')->name('cart.add');
        Route::get('/cart', 'index')->name('cart.index');
        Route::post('/cart/update/{id}', 'update')->name('cart.update');
        Route::post('/cart/remove/{id}', 'remove')->name('cart.remove');
        Route::post('/cart/checkout', 'checkout')->name('cart.checkout');
    });

    Route::controller(CheckoutController::class)->group(function () {
        Route::get('/checkout', 'index')->name('checkout.index');
        Route::post('/checkout/store', 'store')->name('checkout.store');
        Route::get('/checkout/success', 'success')->name('checkout.success');
    });

});
