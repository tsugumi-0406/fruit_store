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

Route::get('/products', [FruitController::class, 'index']);
 

Route::get('/products/{productId}', [FruitController::class, 'detail']);

Route::get('/products/{productId}/update', [FruitController::class, 'update']);

Route::get('/products/register', [FruitController::class, 'register']);

Route::get('/products/products/search', [FruitController::class, 'search']);

Route::get('/products/{productId}/delete', [FruitController::class, 'delete']);

