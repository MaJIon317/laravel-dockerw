<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Filter;
use App\Models\FilterCategory;
use App\Http\Requests\CategoryRequest as Request;

class CategoryController extends Controller
{
    private function getFilters()
    {
        return Filter::all();
    }
    
    private function getCategories()
    {
        return Category::all();
    }

    private function udapteFilterCategory(Request $request, Category $category): void
    {
        $category->filters()->delete();

        if (isset($request->filter_category) && !empty($request->filter_category)) {
            foreach ($request->filter_category as $filter_id) {
                $category->filters()->insert(array(
                    'filter_id' => $filter_id,
                    'category_id' => $category->id,
                ));
            } 
        }
    }

    /**
     * Display a listing of the resource.
     */ 
    public function index()
    {
        $categories = Category::orderBy('title')->paginate(config('admin.limit'));

        return view('admin.categories', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $action = route('admin.categories.store');

        $categories = $this->getCategories();

        $filters = $this->getFilters();

        return view('admin.category-form', compact('action', 'categories', 'filters'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $category = Category::create($request->all());

        $this->udapteFilterCategory($request, $category);

        return redirect()->route('admin.categories.index')->with('success', 'Category added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        $action = route('admin.categories.update', $category);

        $categories = $this->getCategories();

        $filters = $this->getFilters();

        $filter_category = array();

        foreach ($category->filters as $filter) {
            $filter_category[] = $filter->filter_id;
        }
 
        return view('admin.category-form', compact('category', 'action', 'categories', 'filters', 'filter_category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->request->set('sorts', (array)$request->input('sorts'));
       
        $category->update($request->all());

        $this->udapteFilterCategory($request, $category);
 
        return redirect()->route('admin.categories.index')->with('success', 'Category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
  
        return redirect()->route('admin.categories.index')->with('success', 'Category deleted successfully');
    }
}
