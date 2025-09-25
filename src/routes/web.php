<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FruitController;

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

Route::get('/products', [FruitController::class, 'index'])->name('products.index');;

Route::get('/products/search', [FruitController::class, 'search']);

Route::get('/products/register', [FruitController::class, 'add']);

Route::post('/products/register', [FruitController::class, 'store'])->name('images.store');

Route::get('/products/{productId}', [FruitController::class, 'detail'])->name('products.detail');

Route::patch('/products/{productId}/update', [FruitController::class, 'update'])->name('products.update');

Route::delete('/products/{productId}', [FruitController::class, 'delete'])->name('products.delete');

