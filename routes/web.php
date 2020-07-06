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

Route::group(['namespace' => 'User'], function () {
    Route::get('/', 'HomeController@index')->name('homepage');
});

Route::group(['namespace' => 'Auth'], function () {
    Route::get('/admin', 'LoginController@showAdminLoginForm')->name('admin.login-form');
    Route::get('/login', 'LoginController@showUserLoginForm')->name('user.login-form');
    Route::post('/login', 'LoginController@login')->name('login');
    Route::get('/logout', 'LoginController@logout')->name('logout');
});

Route::group(['middleware' => 'auth'], function () {
    Route::group(['prefix' => 'admin', 'middleware' => 'auth_admin', 'namespace' => 'Admin'], function () {
        Route::get('/dashboard', 'DashboardController@index')->name('admin.dashboard');
    });
});
