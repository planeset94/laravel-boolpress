<?php

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

// Utenti non auteticati 

// Route::resource('articles', General\ArticleController::class)->only('index', 'show');
Route::get('/', 'General\ArticleController@index')->name('article.index');

Route::get('articles{article}', 'General\ArticleController@show')->name('article.show');


// Rotte per Admin 
Auth::routes();
Route::middleware('auth')->prefix('admin')->namespace('Admin')->name('admin.')->group(function () {
    Route::get('/', 'ArticleController@index')->name('index');
    Route::get('articles{article}', 'ArticleController@show')->name('show');
    // Route::resource('articles', ArticleController::class);
    Route::get('articles/create', 'ArticleController@create')->name('create');
    Route::post('articles', 'ArticleController@store')->name('store');
});