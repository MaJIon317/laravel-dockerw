<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Http\Requests\FaqRequest as Request;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $faqs = Faq::orderByDesc('created_at')->paginate(config('admin.limit'));

        return view('admin.faqs', compact('faqs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $action = route('admin.faqs.store');

        return view('admin.faq-form', compact('action'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Faq::create($request->all());

        return redirect()->route('admin.faqs.index')->with('success', 'Faq added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Faq $faq)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Faq $faq)
    {
        $action = route('admin.faqs.update', $faq);

        return view('admin.faq-form', compact('faq', 'action'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Faq $faq)
    {
        $faq->update($request->all());
  
        return redirect()->route('admin.faqs.index')->with('success', 'Faq updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Faq $faq)
    {
        $faq->delete();
  
        return redirect()->route('admin.faqs.index')->with('success', 'Faq deleted successfully');
    }
}
