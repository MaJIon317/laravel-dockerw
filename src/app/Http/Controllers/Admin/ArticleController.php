<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Http\Requests\ArticleRequest as Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource. 
     */
    public function index()
    {
        $articles = Article::orderByDesc('created_at')->paginate(config('admin.limit'));

        return view('admin.articles', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $action = route('admin.articles.store');

        return view('admin.article-form', compact('action'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Article::create($request->all());

        return redirect()->route('admin.articles.index')->with('success', 'Article added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        $action = route('admin.articles.update', $article);

        return view('admin.article-form', compact('article', 'action'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        $request->request->set('status', (int)$request->request->get('status'));

        $article->update($request->all());
  
        return redirect()->route('admin.articles.index')->with('success', 'Article updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        $article->delete();
  
        return redirect()->route('admin.articles.index')->with('success', 'Article deleted successfully');
    }
}
