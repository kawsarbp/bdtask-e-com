<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/
/*frontend routes*/
Route::get('/',[DashboardController::class,'index'])->name('index');
/*add to cart*/
Route::get('/product-details/{ud}',[ProductController::class,'productDetails'])->name('productDetails');
Route::post('/add-to-cart/{id}',[ProductController::class,'addToCart'])->name('addToCart');
Route::get('/show-cart',[ProductController::class,'showCart'])->name('showCart');
Route::get('/remove-cart/{id}',[ProductController::class,'removeCart'])->name('removeCart');



Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified' ])->group(function () {
    Route::get('/dashboard',[DashboardController::class,'redirect'])->name('dashboard');
    /*category routes*/
    Route::prefix('/category')->name('category.')->group(function (){
        Route::get('/',[CategoryController::class,'index'])->name('index');
        Route::get('/create',[CategoryController::class,'create'])->name('create');
        Route::post('/create',[CategoryController::class,'store'])->name('store');
        Route::delete('/{id}', [CategoryController::class, 'destroy'])->name('destroy');
        Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('edit');
        Route::put('/edit/{id}', [CategoryController::class, 'update'])->name('update');
    });
    /*Product routes*/
    Route::prefix('/product')->name('product.')->group(function (){
        Route::get('/',[ProductController::class,'index'])->name('index');
        Route::get('/create',[ProductController::class,'create'])->name('create');
        Route::post('/store',[ProductController::class,'store'])->name('store');
        Route::delete('/delete/{id}',[ProductController::class,'destroy'])->name('destroy');
        Route::get('/edit/{id}',[ProductController::class,'edit'])->name('edit');
        Route::post('/edit/{id}',[ProductController::class,'update'])->name('update');


    });


});
