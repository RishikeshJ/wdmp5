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

Route::get('/admin/users', function () {
    $products = Product::all();
    $users = User::all();
    return view('admin_voew_users', [
        'products' => $products,
        'users' => $users,
    ]);
});

Route::redirect('/admin', '/admin/users');
