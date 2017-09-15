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

Route::get('/', [
    'as' => 'root',
    'uses' => 'WelcomeController@index'
]);

Route::get('home', [
    'as' => 'home',
    'uses' => 'WelcomeController@home'
]);

// User Registration
Route::group(['prefix' => 'auth', 'as' => 'user.'], function() {
    Route::get('register', [
        'as' => 'create',
        'uses' => 'Auth\RegisterController@showRegistrationForm'
    ]);
    Route::get('register', [
        'as' => 'store',
        'uses' => 'Auth\RegisterController@register'
    ]);
});

// Session
Route::group(['prefix' => 'auth', 'as' => 'session.'], function() {
    Route::get('login', [
        'as' => 'create',
        'uses' => 'Auth\LoginController@showLoginForm'
    ]);
    Route::get('login', [
        'as' => 'store',
        'uses' => 'Auth\LoginController@login'
    ]);
    Route::get('login', [
        'as' => 'destroy',
        'uses' => 'Auth\LoginController@logout'
    ]);
});

// Password Reminder
Route::group(['prefix' => 'password'], function() {
    Route::get('remind', [
        'as' => 'reminder.create',
        'uses' => 'Auth\ForgotPasswordController@showLinkRequestForm'
    ]);
    Route::get('remind', [
        'as' => 'reminder.store',
        'uses' => 'Auth\ForgotPasswordController@sendResetLinkEmail'
    ]);
    Route::get('reset/{token}', [
        'as' => 'reset.create',
        'uses' => 'Auth\ResetPasswordController@showResetForm'
    ]);
    Route::get('reset', [
        'as' => 'reset.store',
        'uses' => 'Auth\ResetPasswordController@reset'
    ]);
});