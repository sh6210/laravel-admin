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

Route::get('/', function () {
    return view('welcome');
});

Route::get('', 'Auth\AuthController@index')->name('user.dashboard');

Route::prefix('admin')->group(function(){

	Route::get('', 'AdminController@index')->name('admin.dashboard');

	Route::get('login', 'Auth\AdminLoginController@showLogin')->name('admin.login');
	Route::post('login', 'Auth\AdminLoginController@login');
	Route::get('logout', 'Auth\AdminLoginController@logout');

});



Route::get('/register', 'Auth\AuthController@showRegistration')->name('register');
Route::post('/register', 'Auth\AuthController@register');

Route::get('/login', 'Auth\AuthController@showLogin')->name('login')->name('login');
Route::post('/login', 'Auth\AuthController@login')->name('login');

Route::get('/logout', 'Auth\AuthController@logout')->name('login')->name('logout');