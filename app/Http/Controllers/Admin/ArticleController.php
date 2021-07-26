<?php

namespace App\Http\Controllers\Admin;

use App\Article;
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
        return view('admin.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('admin.create');
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
                'title'=>' required | min:5 | max:50', 
                'text'=>'required',
                'intro'=>'nullable',
                'author'=> 'required',
                'picture'=>'required | image | max:300',
                'time'=>'required| date'
                ]
            );
            
            
            
            
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
        return view('admin.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        return view('admin.edit', compact('article'));
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
                'title'=>' required | min:5 | max:50', 
                'text'=>'required',
                'intro'=>'nullable',
                'author'=> 'required',
                'picture'=>'required',
                'time'=>'required| date'
            ]
        );

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