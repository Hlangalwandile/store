<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
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

Route::controller(HomeController::class)->group(function(){
    Route::get('/','index')->name('home');
});

Auth::routes([
    'verify'=> true
]);


Route::prefix('products')->controller(ProductController::class)->group(function(){
    Route::get('/','index')->name('products');
    Route::get('/product','show')->name('product.show');
    Route::get('/create','create')->name('product.create');
    Route::get('/edit','edit')->name('product.edit');
});

Route::prefix('categories')->controller(CategoryController::class)->group(function(){
    Route::get('/','index')->name('categories');
    Route::get('/category','show')->name('category.show');
    Route::get('/create','create')->name('category.create');
    Route::get('/edit','edit')->name('category.edit');
});
