<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Holiday;
use App\Http\Requests\HolidayRequest as Request;

class HolidayController extends Controller
{
    private function getCategories()
    {
        return Category::all();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $holidays = Holiday::orderBy('month')->orderBy('day')->paginate(config('admin.limit'));

        return view('admin.holidays', compact('holidays'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $action = route('admin.holidays.store');

        $categories = $this->getCategories();

        return view('admin.holiday-form', compact('action', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Holiday::create($request->all());

        return redirect()->route('admin.holidays.index')->with('success', 'Holiday added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Holiday $holiday)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Holiday $holiday)
    {
        $action = route('admin.holidays.update', $holiday);

        $categories = $this->getCategories();

        return view('admin.holiday-form', compact('holiday', 'action', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Holiday $holiday)
    {
        $holiday->update($request->all());
  
        return redirect()->route('admin.holidays.index')->with('success', 'Holiday updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Holiday $holiday)
    {
        $holiday->delete();
  
        return redirect()->route('admin.holidays.index')->with('success', 'Holiday deleted successfully');
    }
}
