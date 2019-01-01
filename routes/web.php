<?php

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

Route::get('/', 'Front\FrontController@index')->name('front.index');

Route::get('/category/{slug}', 'Front\FrontController@categoryWithProducts')->name('front.category.products');

Route::get('product/{category}', 'Front\FrontController@productWithCategory')->name('front.product.category');

Route::get('/show/{product}', 'Front\FrontController@showProduct')->name('front.show');

Route::get('/addToCart/{product}', 'Front\FrontController@addToCart')->name('front.addToCart');

Route::get('/cart', 'Front\FrontController@showCart')->name('front.showCart');

Route::get('/checkout', 'Front\FrontController@checkout')->name('front.checkout');


Route::group(['prefix' => 'admin'], function () {


    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');

    Route::group(['middleware' => ['auth:admin']], function () {

        Route::get('/dashboard', 'Admin\AdminController@dashboard')->name('admin.dashboard');
        Route::get('/dashboard-v2', 'Admin\AdminController@index')->name('admin.index');


        Route::resource('product', 'Admin\ProductController');
        Route::resource('category', 'Admin\CategoryController');

        /**
         * ROUTES FOR IMPORT PRODUCTS AND CATEGORIES WITH EXCEL
         */

        Route::get('importExportCategories', 'Admin\ExcelController@importExportCategories')->name('excel.indexCategories');
        Route::get('downloadExcelCategories/{type}', 'Admin\ExcelController@downloadExcelCategories');
        Route::post('importExcelCategories', 'Admin\ExcelController@importExcelCategories');

        Route::get('importExport', 'Admin\ExcelController@importExport')->name('excel.index');
        Route::get('downloadExcel/{type}', 'Admin\ExcelController@downloadExcel');
        Route::post('importExcel', 'Admin\ExcelController@importExcel');

        /**
         * ROLE ROUTES
         */

        Route::resource('/role', 'Admin\RoleController')->except(['show']);

        /**
         * USER ROUTES
         */

        Route::resource('/user', 'Admin\UserController')->except(['show']);

    });
});

