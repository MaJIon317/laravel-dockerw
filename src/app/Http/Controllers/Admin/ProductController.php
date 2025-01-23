<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DiscountGroup;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\ProductCreateRequest;
use App\Http\Requests\ProductUpdateRequest;

class ProductController extends Controller
{
    private function getCategories()
    {
        return Category::all();
    }
 
    private function getDiscountGroups()
    {
        return DiscountGroup::all();
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $products = Product::orderBy('created_at')->paginate(config('admin.limit'));

        return view('admin.products', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $action = route('admin.products.store');

        $categories = $this->getCategories();

        $discount_groups = $this->getDiscountGroups();

        return view('admin.product-form', compact('action', 'categories', 'discount_groups'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductCreateRequest $request)
    {
        Product::create($request->all());

        return redirect()->route('admin.products.index')->with('success', 'Product added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $action = route('admin.products.update', $product);

        $categories = $this->getCategories();

        $discount_groups = $this->getDiscountGroups();

        return view('admin.product-form', compact('product', 'action', 'categories', 'discount_groups'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductUpdateRequest $request, Product $product)
    {
        $request->request->set('images', (array)$request->input('images'));
        $request->request->set('status', (int)$request->request->get('status'));

        $product->update($request->all());
 
        return redirect()->route('admin.products.index')->with('success', 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
  
        return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully');
    }
}
