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
Route::get('/', 'General\ArticleController@index');



// Rotte per Admin 
Auth::routes();
Route::middleware('auth')->prefix('admin')->namespace('Admin')->name('admin.')->group(function () {
    Route::get('/', 'ArticleController@index');
    //Route::get('/', 'HomeController@index')->name('dashbord');
    //Route::resource('articles', ArticleController::class);
});