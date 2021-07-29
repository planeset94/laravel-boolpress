<?php

namespace App\Http\Controllers\Admin;

use App\Article;
use App\Category;
use App\Tag;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles=Article::orderBy('id','DESC')->paginate(10);
        $categories=Category::all();
        $tags=Tag::all();
        // ddd($articles);
        return view('admin.index', compact('articles', 'categories', 'tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();
        $tags=Tag::all();
        return view ('admin.create', compact('categories','tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData=$request->validate(
            [
                'category_id'=>'nullable|exists:categories,id',
                'title'=>' required | min:5 | max:50', 
                'text'=>'required',
                'intro'=>'nullable',
                'author'=> 'required',
                'picture'=>'required | image | max:300',
                'time'=>'required| date'
                ]
            );
            
            
            
            // trasformo le immagini in percorsi testuali 
        if(array_key_exists("picture", $validatedData)) {
        $img_path = Storage::put("article_images", $validatedData["picture"]);
        $validatedData["picture"] = $img_path;
        }
                
        Article::create($validatedData);       
        return redirect()->route('admin.articles.index');
        
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
        return view('admin.show', compact('article', 'categories', 'tags'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    { 
        $categories=Category::all();
        $tags=Tag::all();
        return view('admin.edit', compact('article','categories','tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        // ddd($request->all());
        $validatedData=$request->validate(
            [
                'category_id'=>'nullable|exists:categories,id',
                'title'=>' required | min:5 | max:50', 
                'text'=>'required',
                'intro'=>'nullable',
                'author'=> 'required',
                'picture'=>'nullable',
                'time'=>'required| date'
            ]
        );


        // trasformo le immagini in percorsi testuali 
        if(array_key_exists("picture", $validatedData)) {
            $img_path = Storage::put("article_images", $validatedData["picture"]);
            $validatedData["picture"] = $img_path;
            }
        $article->update($validatedData);
        return redirect()->route('admin.articles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
           $article->delete();
           return redirect()->route('admin.articles.index');
            
    }
}