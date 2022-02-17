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

Route::get('/', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin'], function () {
    Route::get('/', 'AdminController@index')->name('admin');
    Route::post('/logo', 'AdminController@logo')->name('admin.logo');
    Route::post('/carousel', 'AdminController@carousel')->name('admin.carousel');
    Route::post('/team', 'AdminController@team')->name('admin.team');
});
