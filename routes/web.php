<?php

use App\Product;
use App\User;
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
    return view('welcome');
});

Route::get('/home', function () {
    $products = Product::all();
    return view('home', [
        'products' => $products,
    ]);
});

Route::resource('admin/users', 'AdminUserController')->except([]);
Route::resource('admin/products', 'AdminProductController')->except([]);
Route::resource('admin/orders', 'AdminOrderController')->except([]);
Route::resource('admin/orders/item', 'AdminOrderItemController')->except([]);
Route::redirect('/admin', '/admin/users');

Route::resource('feedback', 'CustomerQueryController')->except([]);