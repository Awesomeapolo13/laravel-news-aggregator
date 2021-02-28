<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HelloController;
use \App\Http\Controllers\FeedbackController;
use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\CategoryController;
use \App\Http\Controllers\Admin\DownloadController;

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

//Страница приветствия
Route::get('/hello', [HelloController::class, 'index'])
    ->name('hello');


Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/', [IndexController::class, 'index'])
        ->name('admin');
    Route::resource('news', AdminNewsController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('download', DownloadController::class);
});

//Группа страниц для оторажения новостей
//Группа роутов (prefix - префикс для группы роутов, as - превикс для нейминга)
Route::group(['prefix' => 'news', 'as' => 'news.'], function () {
    // Теперь не нужно писать везде news
    // Страница отображения категорий и перечня всех новостей
    Route::get('/', [NewsController::class, 'index'])
        ->name('index');

    // Страница отображения новостей, принадлежащих одной категории
    Route::get('/{category}', [NewsController::class, 'category'])
        ->where('category', '\w+')
        ->name('category');

    // Страница отображения страницы конкретной новости
    Route::get('/{category}/{id}', [NewsController::class, 'show'])
        ->where('category', '\w+')
        ->where('id', '\d+')
        ->name('show');
});

// Страница добавления новости
Route::get('/add', [NewsController::class, 'add'])
    ->name('add');

// Страница авторизации
Route::get('/auth', [AuthController::class, 'index'])
    ->name('auth');

Route::resource('feedback', FeedbackController::class);
