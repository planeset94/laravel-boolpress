<?php

namespace App\Http\Controllers\General;

use App\Article;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
           
        $articles=Article::orderBy('id', 'DESC')->paginate(10);
        return view('general.welcome', compact('articles'));
    }

   
    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return view('general.show', compact('article'));
    }

    
}