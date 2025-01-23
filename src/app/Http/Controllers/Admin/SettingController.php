<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Property;
use App\Models\Setting;
use App\Http\Requests\SettingRequest as Request;

use Illuminate\Support\Facades\Cache;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $action = route('admin.settings.store'); 
        
        $settings = array();

        $setting_data = Setting::all();

        if (count($setting_data) > 0) {
            foreach ($setting_data as $setting) {
                $unserialize = @unserialize($setting->value);

                $settings[$setting->key] = $unserialize !== false ? $unserialize : $setting->value;
            }
        } else {
            $settings = config('settings');
        }

        $settings = collect($settings);

        $properties = Property::all();

        return view('admin.settings', compact('action', 'settings', 'properties'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /** 
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
        $settings = array();

        foreach ($request->all() as $key => $value) {
            if (in_array($key, ['_token'])) { continue; }

            $settings[$key]['key'] = $key;
            $settings[$key]['value'] = is_array($value) ? serialize($value) : $value;
        }
 
        if ($settings) {
            Setting::truncate();
            Setting::insert(array_values($settings));
            Setting::export();
        }

        return redirect()->route('admin.settings.index')->with('success', 'Setting update successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(Setting $setting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Setting $setting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Setting $setting)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Setting $setting)
    {
        //
    }
}
