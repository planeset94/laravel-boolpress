<?php
use App\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('articles', function (){
    $articles=Article::with(['category', 'tags'])->orderBy('id', 'desc')->paginate();
    return response()->json([
        'name'=>'Articoli', 
        'n_items'=>count($articles),
        'status_code'=> 200,
        'response'=> $articles
    ]);
});