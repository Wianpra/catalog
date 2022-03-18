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
Route::post('/search', 'ProductController@search');
Route::get('/getData-mainCategory', 'ProductController@getMain');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/product-catalog', 'ProductController@index');
Route::get('/product-detail/{id}', 'ProductController@detail');
Route::get('contact-us', 'ContactUsContoroller@index')->name('contact-us');
Route::get('print-history', 'AboutUsController@pdf');
Route::get('about-us', 'AboutUsHomeController@index');
Route::get('/product-category/{id}', 'ProductController@category');
Route::get('/product-subcategory/{id}', 'ProductController@subcategory');
Route::get('getProduct/{id}', 'ProductController@getProduct');
Route::get('product-knowledge', 'ProductController@productKnowledge')->name('product-knowledge');
Route::get('detail-knowledge/{id}', 'ProductController@detailKnowledge');

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
    Route::get('get-product', 'ProductAdminController@getProduct');
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
    
    Route::get('/category-admin', 'CategoryAdminController@index');
    Route::post('/category-admin/store', 'CategoryAdminController@store');
    Route::get('/category-admin/{id}/edit', 'CategoryAdminController@edit');
    Route::post('/category-admin-update/{id}', 'CategoryAdminController@update');
    Route::get('/category-admin/delete/{id}', 'CategoryAdminController@delete');
    
    Route::get('sosmed-admin', 'ContactUsContoroller@admin')->name('sosmed-admin');
    Route::get('get-sosmed', 'ContactUsContoroller@getSosmed')->name('get-sosmed');
    Route::post('store-sosmed', 'ContactUsContoroller@storeSosmed')->name('store-sosmed');
    Route::get('/profile-admin', 'DashboardController@profile');
    Route::get('/dashboard', 'DashboardController@index');
    Route::get('/profile-admin/edit/{id}', 'DashboardController@editProfile');
    Route::post('/profile-admin/update/{id}', 'DashboardController@updateProfile');
    
    Route::get('/about-admin', 'AboutUsController@index');
    Route::get('/getData-visi/{id}', 'AboutUsController@getDataVisi');
    Route::get('/getData-misi/{id}', 'AboutUsController@getDataMisi');
    Route::get('/getData-history/{id}', 'AboutUsController@getDataHistory');

    Route::post('postData-visi/{id}', 'AboutUsController@postDataVisi');
    Route::post('postData-misi/{id}', 'AboutUsController@postDataMisi');
    Route::post('postData-history/{id}', 'AboutUsController@postDataHistory');

    Route::get('productKnowledge', 'ProductAdminController@productKnowledge');
    Route::post('store-knowledge', 'ProductAdminController@storeKnowledge');
    Route::post('update-knowledge/{id}', 'ProductAdminController@updateKnowledge');
    Route::get('delete-knowledge/{id}', 'ProductAdminController@deleteKnowledge'); 
    Route::get('get-knowledge/{id}', 'ProductAdminController@getKnowledge');
    Route::get('get-knowledge-img/{id}', 'ProductAdminController@getKnowledgeImg');
    Route::get('edit-knowledge/{id}', 'ProductAdminController@editKnowledge');

    Route::get('founder-index', 'FounderControler@index');
    Route::post('store-founder', 'FounderControler@store');
    Route::get('edit-founder/{id}', 'FounderControler@edit');
    Route::post('update-founder/{id}' , 'FounderControler@update');
    Route::get('delete-founder/{id}', 'FounderControler@destroy');
    Route::get('get-founder-img/{id}', 'FounderControler@getFounderImg');

    Route::get('index-banner', 'BannerController@index');
    Route::post('store-banner', 'BannerController@store');
    Route::get('edit-banner/{id}', 'BannerController@edit');
    Route::post('update-banner/{id}' , 'BannerController@update');
    Route::get('delete-banner/{id}', 'BannerController@destroy');
    Route::get('get-banner-img/{id}', 'BannerController@getBannerImg');
});
