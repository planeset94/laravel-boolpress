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

   // Acquisizione contatti 
Route::get('contacts', 'PageController@contact')->name('contacts.form');
Route::post('contacts', 'PageController@sendForm')->name('contacts.send');


// Pagina principale e approfondimento
Route::get('/', 'General\ArticleController@index')->name('article.index');
Route::get('articles{article}', 'General\ArticleController@show')->name('article.show');

//Rotte VUe js
//Rotta per le categorie
Route::get('categories', 'CategoryController@index')->name('categories.index');




// Rotte per Admin 
Auth::routes();
Route::prefix('admin')->middleware('auth')->namespace('Admin')->name('admin.')->group(function () {
    Route::resource('articles', ArticleController::class);
});