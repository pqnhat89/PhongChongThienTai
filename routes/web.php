<?php
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PostController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/gioi-thieu', [HomeController::class, 'about'])->name('about');
Route::get('/so-do-to-chuc', [HomeController::class, 'structure'])->name('structure');
Route::get('/the-loai/{type}', [PostController::class, 'index'])->name('postIndex');
Route::get('/xem/{id}', [PostController::class, 'view'])->name('postView');
Route::get('/lich-cong-tac', [HomeController::class, 'schedule'])->name('schedule');

Route::prefix('admin')->group(function () {
    // setting
    Route::get('/', [AdminController::class, 'index'])->name('admin');
    Route::post('/logo', [AdminController::class,'logo'])->name('admin.logo');
    Route::post('/carousel', [AdminController::class,'carousel'])->name('admin.carousel');
    Route::post('/team', [AdminController::class,'team'])->name('admin.team');

    // post
    Route::get('/post', [AdminController::class,'postIndex'])->name('admin.post.index');
    Route::get('/post/create', [AdminController::class,'postCreate'])->name('admin.post.create');
    Route::match(['get', 'post', 'put'], '/post/update/{id}', [AdminController::class,'postUpdate'])->name('admin.post.update');
    Route::delete('/post/delete/{id}', [AdminController::class,'postDelete'])->name('admin.post.delete');

    // user
    Route::get('/user', [AdminController::class,'userIndex'])->name('admin.user.index');
    Route::get('/user/create', [AdminController::class,'userCreate'])->name('admin.user.create');
    Route::match(['get', 'put'], '/user/update/{id}', [AdminController::class,'userUpdate'])->name('admin.user.update');
    Route::delete('/user/delete/{id}', [AdminController::class,'userDelete'])->name('admin.user.delete');

    // banner
    Route::match(['get', 'post'], '/banner', [AdminController::class,'banner'])->name('admin.banner.index');

    // setting
    Route::match(['get', 'post'], '/setting', [AdminController::class,'setting'])->name('admin.setting.index');

    // menu
    Route::match(['get', 'post'], '/menu', [AdminController::class,'menu'])->name('admin.menu.index');
    Route::match(['get', 'post'], '/menu/{id}', [AdminController::class,'submenu'])->name('admin.menu.sub');

    // schedule
    Route::get('/schedule', [AdminController::class,'scheduleIndex'])->name('admin.schedule.index');
    Route::get('/schedule/create', [AdminController::class,'scheduleCreate'])->name('admin.schedule.create');
    Route::match(['get', 'put'], '/schedule/update/{id}', [AdminController::class,'scheduleUpdate'])->name('admin.schedule.update');
    Route::delete('/schedule/delete/{id}', [AdminController::class,'scheduleDelete'])->name('admin.schedule.delete');

    Route::get('/list-per-cat', [AdminController::class,'listPerCatIndex'])->name('admin.list.index');
});