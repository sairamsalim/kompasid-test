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

Route::group(['middleware' => ['auth']], function() {
    Route::resource('/','Auth\LoginController@login');
	Route::get('/home', 'HomeController@index')->name('home');
	Route::resource('users','UserController');
	Route::resource('roles','RoleController');
	Route::resource('categories','CategoryController');
	Route::resource('blogs','BlogController');
});