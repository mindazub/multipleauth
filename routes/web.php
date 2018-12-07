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
Route::get('/show', 'Front\FrontController@show')->name('front.show');


Route::prefix('admin')->group(function() {
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/dashboard', 'Admin\AdminController@dashboard')->name('admin.dashboard');
    Route::get('/dashboard-v2', 'Admin\AdminController@index')->name('admin.index');


    Route::resource('products', 'Admin\ProductController');
    Route::resource('category', 'Admin\CategoryController');
});
