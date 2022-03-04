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


Auth::routes();

Route::get('/', 'ProductController@home');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/product-catalog', 'ProductController@index');
Route::get('/product-detail/{id}', 'ProductController@detail');

Route::group(['middleware' => 'auth'], function (){
    Route::get('/product-admin', 'ProductAdminController@index');
    Route::get('/product-admin/create', 'ProductAdminController@create');
    Route::post('/product-admin/store', 'ProductAdminController@store');
    Route::get('/product-admin/edit/{id}', 'ProductAdminController@edit');
    Route::get('/view-edit-description/{id}', 'ProductAdminController@viewDescription');
    Route::post('/save-description/update/{id}', 'ProductAdminController@saveDescription');
    Route::post('/product-admin/update/{id}', 'ProductAdminController@update');
    Route::post('/edit-category-product/{id}', 'ProductAdminController@updateCategory');
    Route::get('/product-admin-delete/{id}', 'ProductAdminController@delete');
    Route::post('store-gambar', 'ProductAdminController@storeGambar')->name('store-gambar');
    Route::post('remove-gambar', 'ProductAdminController@removeGambar')->name('remove-gambar');
    Route::post('delete-gambar/{id}', 'ProductAdminController@deleteGambar')->name('delete-gambar');
    Route::get('get-image/{id}', 'ProductAdminController@getImage');
    
    Route::get('/category-admin', 'CategoryAdminController@index');
    Route::post('/category-admin/store', 'CategoryAdminController@store');
    Route::get('/category-admin/{id}/edit', 'CategoryAdminController@edit');
    Route::get('/category-admin-sub-edit/{id}', 'CategoryAdminController@editSub');
    Route::post('/category-admin-update/{id}', 'CategoryAdminController@update');
    Route::get('/category-admin/delete/{id}', 'CategoryAdminController@delete');
    Route::post('/save-sub-category/store/{id}', 'CategoryAdminController@storeSub');
    Route::post('/save-sub-category/update/{id}', 'CategoryAdminController@updateSub');
    Route::get('/sub-category/edit/{id}', 'CategoryAdminController@editSubC');
    Route::get('/sub-category/delete/{id}', 'CategoryAdminController@deleteSub');
    Route::get('/main-category/edit/{id}', 'CategoryAdminController@editMain');
    Route::post('/save-main-category/update/{id}', 'CategoryAdminController@updateMain');

    Route::get('/profile-admin', 'DashboardController@profile');
    Route::get('/dashboard', 'DashboardController@index');
    Route::get('/profile-admin/edit/{id}', 'DashboardController@editProfile');
    Route::post('/profile-admin/update/{id}', 'DashboardController@updateProfile');
});