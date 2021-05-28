<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\GoogleController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PetitionController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupportController;
use App\Http\Controllers\PayPalController;
use App\Http\Controllers\OpinionController;

//NORMAL LOGIN & REGISTER
Auth::routes();

//LOGIN & REGISTER with google
Route::group(['middleware' => ['guest']], function () {
    Route::get('auth/google', [GoogleController::class, 'redirectToGoogle']);
    Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);
});

Route::get('/', [PagesController::class, 'index'])->name('index');
Route::get('/cart', [PagesController::class, 'cart'])->name('cart');

// //SEARCH
// Route::group(['prefix' => 'search', 'as' => 'search.'], function () {
//     Route::get('/product/{searchProduct}', [PagesController::class, 'searchProduct'])->name('product');
//     Route::get('/product/{shop}/{searchProduct}', [PagesController::class, 'searchShopProduct'])->name('shop.product');
// });

//ADMIN SHOP
//Tiene que ir a fuera de la shop para poder desbloquear, por que abajo mira si esta activa la tienda, así que apovechamos y metemos todo aqui
Route::group(['prefix' => 'shop/admin', 'as' => 'shop.admin.', 'middleware' => ['auth', 'role:admin']], function () {
    Route::get('/', [ShopController::class, 'indexAdmin'])->name('index');
    Route::put('/{shop}/ban', [ShopController::class, 'ban'])->name('ban');
    Route::put('/{shop}/unban', [ShopController::class, 'unban'])->name('unban');
    Route::post('/create', [ShopController::class, 'store'])->name('store');
});
//SHOP
// ---- SELLER
Route::group(['middleware' => ['active_shop', 'auth', 'role:seller']], function () {
    Route::get('/shop/settings/{shop}', [ShopController::class, 'showSettings'])->name('shop.settings');
    Route::put('/shop/setings/{shop}/update', [ShopController::class, 'update'])->name('shop.update');
    Route::get('/shop/{shop}/products', [ProductController::class, 'index'])->name('shop.product.index'); //la ruta ¿?

});
//  ---- GENERAL
Route::group(['prefix' => 'shop', 'as' => 'shop.', 'middleware' => 'active_shop'], function () {
    Route::get('/{shop}', [ShopController::class, 'index'])->name('index');
    Route::get('/{shop}/{product}', [ProductController::class, 'show'])->name('product');

    // PRODUCT
    Route::group(['prefix' => '{shop}', 'as' => 'product.'], function () {
        Route::get('/{product}', [ProductController::class, 'show'])->name('show');
        //PRODUCT
        Route::group(['middleware' => ['auth', 'role:seller']], function () {
            Route::get('/product/create', [ProductController::class, 'create'])->name('create');
            Route::post('/product/create', [ProductController::class, 'store'])->name('store');
            Route::put('/{product}/update', [ProductController::class, 'update'])->name('update');
            Route::delete('{product}/delete', [ProductController::class, 'destroy'])->name('delete');
            Route::put('/{product}/updateStock', [ProductController::class, 'updateStock'])->name('updateStock');

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
    });
});

//PETITIONS
Route::group(['prefix' => 'petition', 'as' => 'petition.'], function () {
    Route::get('/', [PetitionController::class, 'index'])->middleware('auth', 'role:user|seller')->name('index');

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

//CATEGORIES
Route::group(['prefix' => 'categories', 'as' => 'categories.'], function () {
    Route::get('/{category}', [CategoryController::class, 'show'])->name('show');
    //ADMIN CATEGORY
    Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth', 'role:admin']], function () {
        Route::get('/all', [CategoryController::class, 'indexAdmin'])->name('index');
        Route::put('/{category}', [CategoryController::class, 'update'])->name('update');
        Route::post('/create', [CategoryController::class, 'store'])->name('store');
    });
});

//SUPPORT
Route::group(['prefix' => 'support', 'as' => 'support.'], function () {

    //USER & SELLER
    Route::group(['middleware' => ['auth', 'role:user|seller']], function () {
        Route::get('/', [SupportController::class, 'index'])->name('index');
        Route::post('/create', [SupportController::class, 'store'])->name('store');
    });

    //ADMIN
    Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth', 'role:admin']], function () {
        Route::get('/', [SupportController::class, 'indexAdmin'])->name('index');
        Route::get('/{support}', [SupportController::class, 'show'])->name('show');
        Route::put('/{support}', [SupportController::class, 'update'])->name('update');
        Route::post('/close/{support}', [SupportController::class, 'closeSupport'])->name('close');
    });
});

//OPINIONS
Route::group(['prefix' => 'opinion', 'as' => 'opinion.'], function () {
    //COMUNES
    Route::get('/', [OpinionController::class, 'index'])->name('index');
    //USUARIOS
    Route::group(['middleware' => ['auth', 'role:user']], function () {
        Route::put('/update/{shop}/{product}/{opinion}', [OpinionController::class, 'update'])->name('update');
        Route::post('/create/{shop}/{product}', [OpinionController::class, 'store'])->name('store');
    });
    //ADMIN||USER
    Route::group(['middleware' => ['auth', 'role:admin|user']], function () {
        Route::delete('/{shop}/{product}/{comment}/delete', [OpinionController::class, 'destroy'])->name('delete');
    });
});

//PAYPAL
Route::group(['prefix' => 'payment', 'as' => 'payment.'], function () {

    //USUARIOS
    Route::get('/payment', [PayPalController::class, 'payment'])->name('payment');
    Route::get('/cancel', [PayPalController::class, 'cancel'])->name('cancel');
    Route::get('/success', [PayPalController::class, 'success'])->name('success');
});
