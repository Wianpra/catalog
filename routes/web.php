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
    return view('index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/product-catalog', 'ProductController@index');

Route::get('/product-admin', 'ProductAdminController@index');
Route::get('/product-admin/create', 'ProductAdminController@create');
Route::post('/product-admin/store', 'ProductAdminController@store');
Route::post('store-gambar', 'ProductAdminController@storeGambar')->name('store-gambar');
Route::post('remove-gambar', 'ProductAdminController@removeGambar')->name('remove-gambar');

Route::get('/category-admin', 'CategoryAdminController@index');
Route::post('/category-admin/store', 'CategoryAdminController@store');
