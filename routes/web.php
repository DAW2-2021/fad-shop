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

//NORMAL LOGIN & REGISTER
Auth::routes();

//LOGIN & REGISTER with google
Route::group(['middleware' => ['guest']], function () {
    Route::get('auth/google', [GoogleController::class, 'redirectToGoogle']);
    Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);
});

Route::get('/', [PagesController::class, 'index'])->name('index');
Route::get('/cart', [PagesController::class, 'cart'])->name('shop.cart');

//SEARCH
Route::group(['prefix' => 'search', 'as' => 'search.'], function () {
    Route::get('/product/{searchProduct}', [PagesController::class, 'searchProduct'])->name('product');
    Route::get('/product/{shop}/{searchProduct}', [PagesController::class, 'searchShopProduct'])->name('shop.product');
    Route::get('/category/{searchCategory}', [PagesController::class, 'searchCategory'])->name('category');
    // Meter un search de tienda??
});

//ADMIN SHOP
//Tiene que ir a fuera de la shop para poder desbloquear, por que abajo mira si esta activa la tienda, así que apovechamos y metemos todo aqui
Route::group(['prefix' => 'shop/admin', 'as' => 'shop.admin.', 'middleware' => ['auth', 'role:admin']], function () {
    Route::put('/{shop}/ban', [ShopController::class, 'ban'])->name('ban');
    Route::put('/{shop}/unban', [ShopController::class, 'unban'])->name('unban');

    Route::post('/create', [ShopController::class, 'store'])->name('store');
    Route::put('/{shop}', [ShopController::class, 'update'])->name('update');
});

//SHOP user/seller
Route::group(['prefix' => 'shop', 'as' => 'shop.', 'middleware' => 'active_shop'], function () {
    Route::get('/{shop}', [ShopController::class, 'index'])->name('index');
    Route::get('/{shop}/{product}', [ProductController::class, 'show'])->name('product');
    //SELLER SHOP
    Route::group(['middleware' => ['auth', 'role:seller']], function () {
        Route::get('/settings/{shop}', [ShopController::class, 'showSettings'])->name('settings');
        Route::get('/settings', [ShopController::class, 'showSettings'])->name('settings');
        //         Route::put('/update', [ShopController::class, 'update'])->name('update');
        //         //delete por soporte (extra)
        //Post,update,etc
    });

    // PRODUCT
    Route::group(['prefix' => '{shop}', 'as' => 'product.'], function () {
        Route::get('/{product}', [ProductController::class, 'index'])->name('index');
        //PRODUCT SELLER
        Route::group(['as' => 'seller.', 'middleware' => ['auth', 'role:seller']], function () {
            Route::get('/product/create', [ProductController::class, 'create'])->name('create');
            Route::post('/product/create', [ProductController::class, 'store'])->name('store');
            Route::put('/{product}/update', [ProductController::class, 'update'])->name('update');

            //El delete funciona con el soft, así que se puede hacer un delete normal que en la bd seguira existiendo
        });
    });
});

//LOGGED
Route::group(['middleware' => ['auth']], function () {
    Route::get('/user', [UserController::class, 'index'])->name('user.index');
    Route::put('/user', [UserController::class, 'update'])->name('user.update');
    //FORMS
    Route::group(['prefix' => 'form', 'as' => 'form.'], function () {
        // ONLY USERS
        Route::get('/shop', [FormController::class, 'showFormShop'])->middleware('role:user')->name('shop');
        // ONLY USERS & SELLERS
        Route::get('/support', [FormController::class, 'showFormSupport'])->middleware('role:user|seller')->name('support');
    });
});

//PETITIONS
Route::group(['prefix' => 'petition', 'as' => 'petition.'], function () {
    Route::get('/', [PetitionController::class, 'index'])->middleware('role:user')->name('index');
    Route::group(['middleware' => ['auth', 'role:user']], function () {
        Route::get('/create', [PetitionController::class, 'create'])->name('create');
        Route::post('/create', [PetitionController::class, 'store'])->name('store');
    });
    //ADMIN PETITIONS
    Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth', 'role:admin']], function () {
        Route::get('/', [PetitionController::class, 'indexAdmin'])->name('index');
        Route::get('/{petition}', [PetitionController::class, 'showAdminPetition'])->name('show');
        Route::put('/{petition}', [PetitionController::class, 'update'])->name('update');
        Route::post('/{petition}', [PetitionController::class, 'acceptPetition'])->name('accept');
        Route::post('/deny/{petition}', [PetitionController::class, 'rejectPetition'])->name('reject');
        Route::post('/pending/{petition}', [PetitionController::class, 'pendingPetition'])->name('pending');
    });
});


// diria que he puesto las rutas bien ya y comentadas, si falta alguna de estas muevela
// // SHOP
// Route::group(['prefix' => 'shop', 'as' => 'shop.'], function () {
//     Route::get('/{shop}', [ShopController::class, 'index'])->name('index');
//     //SELLER
//     Route::group(['as' => 'seller.', 'middleware' => ['auth', 'role:seller']], function () {
//         Route::get('/settings', [ShopController::class, 'showSettings'])->name('settings');
//         Route::put('/update', [ShopController::class, 'update'])->name('update');
//         //delete por soporte (extra)
//     });
//     //Admin
//     Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth', 'role:admin']], function () {
//         //show de administración de tiendas para bloquear (extra)
//         Route::put('/{shop}', [ShopController::class, 'update'])->name('update');
//         Route::post('/create', [ShopController::class, 'store'])->name('store');
//         //delete (bloquear por el campo is_active (extra) )
//     });
// });
