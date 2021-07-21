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
// Rotte per non amministratori 
Route::get('/', function () {
    return view('guest.welcome');
});



Auth::routes(); 
// Rotte per Admin 
Route::middleware('auth')->prefix('admin')->namespace('Admin')->name('admin.')->group(function () {
    Route::get('/', 'HomeController@index')->name('dashbord');
    Route::resource('articles', ArticleController::class);



});