<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Information; 
use App\Http\Requests\InformationRequest as Request;

class InformationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $informations = Information::orderByDesc('created_at')->paginate(config('admin.limit'));

        return view('admin.informations', compact('informations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $action = route('admin.informations.store');

        return view('admin.information-form', compact('action'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Information::create($request->all());

        return redirect()->route('admin.informations.index')->with('success', 'Information added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Information $information)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Information $information)
    {
        $action = route('admin.informations.update', $information);

        return view('admin.information-form', compact('information', 'action'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Information $information)
    {
        $request->request->set('status', (int)$request->request->get('status'));
        
        $information->update($request->all());
  
        return redirect()->route('admin.informations.index')->with('success', 'Information updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Information $information)
    {
        $information->delete();
  
        return redirect()->route('admin.informations.index')->with('success', 'Information deleted successfully');
    }
}
