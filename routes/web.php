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
    Route::group(['prefix' => 'admin'], function () {
        Route::get('/', 'LoginController@showAdminLoginForm')->name('admin.login-form');
        Route::get('/forgot-password', 'ResetPasswordController@showForgotPasswordForm')->name('admin.forgot_password-form');
        Route::get('/reset-password', 'ResetPasswordController@showResetPasswordForm')->name('admin.reset_password-form');
    });

    Route::get('/login', 'LoginController@showUserLoginForm')->name('user.login-form');
    Route::post('/login', 'LoginController@login')->name('login');
    Route::get('/logout', 'LoginController@logout')->name('logout');
    Route::get('/register', 'RegisterController@showRegisterForm')->name('register-form');
    Route::post('/register', 'RegisterController@register')->name('register');
    Route::get('/verify', 'RegisterController@verifyAccount')->name('verify_accounts');
    Route::get('/forgot-password', 'ResetPasswordController@showForgotPasswordForm')->name('user.forgot_password-form');
    Route::post('/forgot-password', 'ResetPasswordController@sendForgotPasswordMail')->name('forgot_password');
    Route::get('/reset-password', 'ResetPasswordController@showResetPasswordForm')->name('user.reset_password-form');
    Route::post('/reset-password', 'ResetPasswordController@resetPassword')->name('reset_password');
});

Route::group(['middleware' => 'auth'], function () {
    Route::group(['prefix' => 'admin', 'middleware' => 'auth_admin', 'namespace' => 'Admin'], function () {
        Route::get('/dashboard', 'DashboardController@index')->name('admin.dashboard');

        Route::group(['prefix' => 'user'], function () {
            Route::get('/', 'UserController@listUsers')->name('user.list');
            Route::get('/create', 'UserController@create')->name('user.create-form');
            Route::post('/create', 'UserController@store')->name('user.create');
            Route::get('/edit/{id}', 'UserController@edit')->name('user.edit');
            Route::put('/edit/{id}', 'UserController@update')->name('user.update');
            Route::delete('/delete/{id}', 'UserController@destroy')->name('user.delete');
        });
    });
});
