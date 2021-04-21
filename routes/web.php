<?php

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

Route::get('/', function () {
    return view('articles');
});

Route::get('/articles', 'App\Http\Controllers\ArticlesController@show');
Route::post('/shoppingcart', 'App\Http\Controllers\ShoppingCartController@submitForm');