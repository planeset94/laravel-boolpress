<?php

namespace App\Http\Controllers\General;

use App\Article;
use App\Category;
use App\Tag;
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
        $categories=Category::all();
        $tags=Tag::all();
        return view('general.welcome', compact('articles', 'categories', 'tags'));
    }

   
    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        $categories=Category::all();
        $tags=Tag::all();
        return view('general.show', compact('article', 'categories', 'tags'));
    }

    
}