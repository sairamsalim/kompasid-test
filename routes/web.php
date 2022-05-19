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

Route::resource('request-demo','DemoController');

Auth::routes();

Route::group(['middleware' => ['auth']], function() {
    Route::resource('/','Auth\LoginController@login');
	Route::get('/home', 'HomeController@index')->name('home');
	Route::resource('institutions','AdminController');
	Route::resource('quotas','QuotaController');
	Route::resource('chats','ChatController');
	Route::resource('databox','DataboxController');
});
