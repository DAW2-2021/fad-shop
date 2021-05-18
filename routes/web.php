<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\GoogleController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\AdminController;

//ELIMINAR AL FINAL
// Route::get('/{route}', function ($route) {
//     return view($route);
// });

//Rutas
Auth::routes();
//Crear la pagina de not found y no permisions

//LOGIN & register with google
Route::group(['middleware' => ['guest']], function () {
    Route::get('auth/google', [GoogleController::class, 'redirectToGoogle']);
    Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);
});

Route::get('/', [PagesController::class, 'index'])->name('index');
Route::get('/cart', [PagesController::class, 'cart'])->name('shop.cart');

//Search
Route::group(['prefix' => 'search', 'as' => 'search.'], function () {
    Route::get('/product/{searchProduct}', [PagesController::class, 'searchProduct'])->name('product');
    Route::get('/product/{shop}/{searchProduct}', [PagesController::class, 'searchShopProduct'])->name('shop.product');
    Route::get('/category/{searchCategory}', [PagesController::class, 'searchCategory'])->name('category');
    // Meter un search de tienda??
});

Route::group(['prefix' => 'shop', 'as' => 'shop.'], function () {
    Route::get('/{shop}', [ShopController::class, 'showShop'])->name('index');
    Route::get('/{shop}/{product}', [ShopController::class, 'showProduct'])->name('product');
    Route::group(['middleware' => ['auth', 'role:seller']], function () {
        Route::get('/settings/{shop}', [ShopController::class, 'showSettings'])->name('index');
        //Post,update,etc
    });
});

Route::group(['middleware' => ['auth']], function () {
    Route::get('/user', [UserController::class, 'index'])->name('user.index');
    Route::group(['prefix' => 'form', 'as' => 'form.'], function () {
        Route::get('/shop', [FormController::class, 'showFormShop'])->middleware('role:user')->name('shop');
        //users-sellers
        Route::get('/support', [FormController::class, 'showFormSupport'])->middleware('role:user|seller')->name('support');
    });
});
