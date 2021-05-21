<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\GoogleController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PetitionController;
use App\Http\Controllers\ProductController;
// ELIMINAR AL FINAL
// Route::get('/{route}', function ($route) {
//     return view($route);
// });

//petitionController(show) solo para el admin

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
    Route::get('/{shop}', [ShopController::class, 'show'])->name('index');
    Route::get('/{shop}/{product}', [ProductController::class, 'show'])->name('product');
    Route::group(['middleware' => ['auth', 'role:seller']], function () {
        Route::get('/settings/{shop}', [ShopController::class, 'showSettings'])->name('settings');
        //Post,update,etc
    });
    //Admin
    Route::group(['middleware' => ['auth', 'role:admin']], function () {
        Route::post('/create', [ShopController::class, 'store'])->name('store');
    });
});

Route::group(['middleware' => ['auth']], function () {
    Route::get('/user', [UserController::class, 'index'])->name('user.index');
    Route::put('/user', [UserController::class, 'update'])->name('user.update');
    Route::group(['prefix' => 'form', 'as' => 'form.'], function () {
        Route::get('/shop', [FormController::class, 'showFormShop'])->middleware('role:user')->name('shop');
        //users-sellers
        Route::get('/support', [FormController::class, 'showFormSupport'])->middleware('role:user|seller')->name('support');
    });
});

Route::group(['prefix' => 'petition', 'as' => 'petition.'], function () {
    Route::get('/', [PetitionController::class, 'index'])->middleware('role:user')->name('index');
    Route::group(['middleware' => ['auth', 'role:user']], function () {
        Route::get('/create', [PetitionController::class, 'create'])->name('create');
        Route::post('/create', [PetitionController::class, 'store'])->name('store');
    });
    //Admin
    Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth', 'role:admin']], function () {
        Route::get('/', [PetitionController::class, 'indexAdmin'])->name('index');
        Route::get('/{petition}', [PetitionController::class, 'showAdminPetition'])->name('show');
        Route::put('/{petition}', [PetitionController::class, 'update'])->name('update');
        Route::post('/{petition}', [PetitionController::class, 'acceptPetition'])->name('accept');
        Route::post('/deny/{petition}', [PetitionController::class, 'rejectPetition'])->name('reject');
        Route::post('/pending/{petition}', [PetitionController::class, 'pendingPetition'])->name('pending');
    });
});

Route::group(['prefix' => 'shop', 'as' => 'shop.'], function () {
    Route::get('/{shop}', [ShopController::class, 'index'])->name('index');
    //Seller
    Route::group(['prefix' => 'seller', 'as' => 'seller.', 'middleware' => ['auth', 'role:seller']], function () {
        Route::get('/', [ShopController::class, 'showSettings'])->name('settings');
        Route::put('/', [ShopController::class, 'update'])->name('update');
        //delete por soporte (extra)
    });
    //Admin
    Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth', 'role:admin']], function () {
        //show de administración de tiendas para bloquear (extra)
        Route::put('/{shop}', [ShopController::class, 'update'])->name('update');
        Route::post('/create', [ShopController::class, 'store'])->name('store');
        //delete (bloquear por el campo is_active (extra) )
    });
});

Route::group(['prefix' => 'product', 'as' => 'product.'], function () {
    Route::get('/{product}', [ProductController::class, 'index'])->name('index');
    //Seller
    Route::group(['prefix' => 'seller', 'as' => 'seller.', 'middleware' => ['auth', 'role:seller']], function () {
        Route::put('/', [ProductController::class, 'update'])->name('update');
        Route::post('/create', [ProductController::class, 'store'])->name('store');
        //delete por activo o stock (extra)
    });
});
