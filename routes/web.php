<?php

use App\Product;
use App\ProductCategory;
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
    $product_cateogory = ProductCategory::all();

    return view('home', [
        'products' => $products,
        'product_category' => $product_cateogory,
    ]);
});

Route::resource('admin/users', 'AdminUserController')->except([]);
Route::resource('admin/products', 'AdminProductController')->except([]);
Route::resource('admin/orders', 'AdminOrderController')->except([]);
Route::resource('admin/orders/item', 'AdminOrderItemController')->except([]);
Route::redirect('/admin', '/admin/users');

Route::resource('feedback', 'CustomerQueryController')->except([]);

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/add-to-cart/{products}', 'CartController@add')->name('cart.add');

Route::get('/cart','CartController@index')->name('cart.index');
Route::get('/cart/destroy/{itemid}','CartController@destroy')->name('cart.destroy');
Route::get('/cart/update/{itemid}', 'CartController@update')->name('cart.update');
Route::get('/cart/checkout', 'CartController@checkout')->name('cart.checkout');

Route::resource('orders', 'OrderController');