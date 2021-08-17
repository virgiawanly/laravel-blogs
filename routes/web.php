<?php

use App\Http\Controllers\AdminPageController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\TopicController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [PageController::class, 'index'])->name('index');
Route::get('/articles', [PageController::class, 'articles'])->name('articles');
Route::get('/article/{article:slug}', [PageController::class, 'showArticle'])->name('articles.read');
Route::get('/topic/{topic:slug}', [PageController::class, 'showTopic'])->name('topics.show');
Route::get('/search', [PageController::class, 'search'])->name('search');

Route::prefix('/admin')->group(function(){
    Route::get('/', [AdminPageController::class, 'dashboard'])->name('admin.dashboard');
    Route::resource('/articles', ArticleController::class);
    Route::resource('/topics', TopicController::class);
});
