<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Http\Requests\NewsRequest as Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $news = News::orderByDesc('created_at')->paginate(config('admin.limit'));

        return view('admin.news', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $action = route('admin.news.store');

        return view('admin.news-form', compact('action'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        News::create($request->all());

        return redirect()->route('admin.news.index')->with('success', 'News added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(News $news)
    {
        $action = route('admin.news.update', $news);

        return view('admin.news-form', compact('news', 'action'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, News $news)
    {
        $request->request->set('status', (int)$request->request->get('status'));

        $news->update($request->all());
  
        return redirect()->route('admin.news.index')->with('success', 'News updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(News $news)
    {
        $news->delete();
  
        return redirect()->route('admin.news.index')->with('success', 'News deleted successfully');
    }
}
