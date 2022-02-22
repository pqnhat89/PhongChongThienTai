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
    // setting
    Route::get('/', 'AdminController@index')->name('admin');
    Route::post('/logo', 'AdminController@logo')->name('admin.logo');
    Route::post('/carousel', 'AdminController@carousel')->name('admin.carousel');
    Route::post('/team', 'AdminController@team')->name('admin.team');

    // post
    Route::get('/post', 'AdminController@postIndex')->name('admin.post.index');
    Route::get('/post/create', 'AdminController@postCreate')->name('admin.post.create');
    Route::match(['get', 'put'], '/post/update/{id}', 'AdminController@postUpdate')->name('admin.post.update');
    Route::delete('/post/delete/{id}', 'AdminController@postDelete')->name('admin.post.delete');

    // user
    Route::get('/user', 'AdminController@userIndex')->name('admin.user.index');
    Route::get('/user/create', 'AdminController@userCreate')->name('admin.user.create');
    Route::match(['get', 'put'], '/user/update/{id}', 'AdminController@userUpdate')->name('admin.user.update');
    Route::delete('/user/delete/{id}', 'AdminController@userDelete')->name('admin.user.delete');
});
