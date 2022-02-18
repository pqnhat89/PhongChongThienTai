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

    // page
    Route::get('/page', 'AdminController@pageIndex')->name('admin.page.index');
    Route::get('/page/create', 'AdminController@pageCreate')->name('admin.page.create');
    Route::get('/page/update/{id}', 'AdminController@pageUpdate')->name('admin.page.update');
    Route::get('/page/delete/{id}', 'AdminController@pageDelete')->name('admin.page.delete');

    // post
    Route::get('/post', 'AdminController@postIndex')->name('admin.post.index');
    Route::get('/post/create', 'AdminController@postCreate')->name('admin.post.create');
    Route::get('/post/update/{id}', 'AdminController@postUpdate')->name('admin.post.update');
    Route::get('/post/delete/{id}', 'AdminController@postDelete')->name('admin.post.delete');
});
