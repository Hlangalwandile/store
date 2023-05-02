<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;


Route::controller(HomeController::class)->group(function(){
    Route::get('/','index')->name('home');
    Route::get('/home','index')->name('home');
});

Auth::routes([
    // 'verify'=> true
]);


Route::prefix('products')->controller(ProductController::class)->group(function(){
    Route::get('/','index')->name('products');
    Route::get('/product','show')->name('product.show');
    Route::get('/create','create')->name('product.create');
    Route::get('/edit/{id}','edit')->name('product.edit');
    Route::POST('/store','store')->name('product.store');
});

Route::prefix('categories')->controller(CategoryController::class)->group(function(){
    Route::get('/','index')->name('categories');
    Route::get('/category','show')->name('category.show');
    Route::get('/create','create')->name('category.create');
    Route::get('/edit/{id}','edit')->name('category.edit');
    Route::POST('/update','update')->name('category.update');
    Route::POST('/store','store')->name('category.store');
    Route::POST('/destroy','destroy')->name('category.destroy');
});
