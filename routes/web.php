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
Route::get('/gioi-thieu', 'HomeController@about')->name('about');
Route::get('/so-do-to-chuc', 'HomeController@structure')->name('structure');
Route::get('/the-loai/{type}', 'PostController@index')->name('postIndex');
Route::get('/xem/{id}', 'PostController@view')->name('postView');
Route::get('/lich-cong-tac/', 'HomeController@schedule')->name('schedule');

Route::group(['prefix' => 'admin'], function () {
    // setting
    Route::get('/', 'AdminController@index')->name('admin');
    Route::post('/logo', 'AdminController@logo')->name('admin.logo');
    Route::post('/carousel', 'AdminController@carousel')->name('admin.carousel');
    Route::post('/team', 'AdminController@team')->name('admin.team');

    // post
    Route::get('/post', 'AdminController@postIndex')->name('admin.post.index');
    Route::get('/post/create', 'AdminController@postCreate')->name('admin.post.create');
    Route::match(['get', 'post', 'put'], '/post/update/{id}', 'AdminController@postUpdate')->name('admin.post.update');
    Route::delete('/post/delete/{id}', 'AdminController@postDelete')->name('admin.post.delete');

    // user
    Route::get('/user', 'AdminController@userIndex')->name('admin.user.index');
    Route::get('/user/create', 'AdminController@userCreate')->name('admin.user.create');
    Route::match(['get', 'put'], '/user/update/{id}', 'AdminController@userUpdate')->name('admin.user.update');
    Route::delete('/user/delete/{id}', 'AdminController@userDelete')->name('admin.user.delete');

    // banner
    Route::match(['get', 'post'], '/banner', 'AdminController@banner')->name('admin.banner.index');

    // setting
    Route::match(['get', 'post'], '/setting', 'AdminController@setting')->name('admin.setting.index');

    // menu
    Route::match(['get', 'post'], '/menu', 'AdminController@menu')->name('admin.menu.index');
    Route::match(['get', 'post'], '/menu/{id}', 'AdminController@submenu')->name('admin.menu.sub');

    // schedule
    Route::get('/schedule', 'AdminController@scheduleIndex')->name('admin.schedule.index');
    Route::get('/schedule/create', 'AdminController@scheduleCreate')->name('admin.schedule.create');
    Route::match(['get', 'put'], '/schedule/update/{id}', 'AdminController@scheduleUpdate')->name('admin.schedule.update');
    Route::delete('/schedule/delete/{id}', 'AdminController@scheduleDelete')->name('admin.schedule.delete');
});
