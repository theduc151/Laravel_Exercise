<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

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


//Routing for Category
Route::group(['prefix' => 'categories', 'as' => 'categories.'], function () {
    //Route shows the list of Categories
    Route::get('/', [CategoryController::class, 'index'])->name('index');

    //Route shows a form to add a new Category
    Route::get('/create', [CategoryController::class, 'create'])->name('create');
    //Route receives inputs from the newly added Form
    Route::post('/', [CategoryController::class, 'store'])->name('store');

    //Route shows details of 1 Category
    Route::get('/{id}', [CategoryController::class, 'show'])->name('show');

    //Route shows 1 Edit Form
    Route::get('/{id}/edit', [CategoryController::class, 'edit'])->name('edit');
    //Route receives inputs from Edit Form
    Route::put('/{id}', [CategoryController::class, 'update'])->name('update');

    //Route delete 1 Category
    Route::delete('/{id}', [CategoryController::class, 'destroy'])->name('destroy');
});



//Routing for Product
Route::group(['prefix' => 'products', 'as' => 'products.'], function () {
    //Route shows the list of Products
    Route::get('/', [ProductController::class, 'index'])->name('index');

    //Route shows a form to add a new Product
    Route::get('/create', [ProductController::class, 'create'])->name('create');
    //Route receives inputs from the newly added Form
    Route::post('/', [ProductController::class, 'store'])->name('store');

    //Route shows details of 1 Product
    Route::get('/{id}', [ProductController::class, 'show'])->name('show');

    //Route shows 1 Edit Form
    Route::get('/{id}/edit', [ProductController::class, 'edit'])->name('edit');
    //Route receives inputs from Edit Form
    Route::put('/{id}', [ProductController::class, 'update'])->name('update');

    //Route delete 1 Product
    Route::delete('/{id}', [ProductController::class, 'destroy'])->name('destroy');
});
