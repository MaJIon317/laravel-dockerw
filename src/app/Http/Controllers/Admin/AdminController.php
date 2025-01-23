<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\AdminRole;
use App\Http\Requests\AdminCreateRequest;
use App\Http\Requests\AdminUpdateRequest;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    private function getRoles()
    {
        return AdminRole::all();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admins = Admin::paginate(config('admin.limit'));

        return view('admin.admins', compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $action = route('admin.admins.store');

        $roles = $this->getRoles();

        return view('admin.admin-form', compact('action', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminCreateRequest $request)
    {
        Admin::create($request->all());

        return redirect()->route('admin.admins.index')->with('success', 'Admin added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Admin $admin)
    {
        $action = route('admin.admins.update', $admin);

        $roles = $this->getRoles();

        return view('admin.admin-form', compact('admin', 'action', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdminUpdateRequest $request, Admin $admin)
    {
        if (!$request->input('password')) {
            $request->request->remove('password');
        }

        $admin->update($request->all());
  
        return redirect()->route('admin.admins.index')->with('success', 'Admin updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $admin)
    { 
        $count = Admin::count();

        if ($count <= 1 || $admin->id === Auth::guard('admin')->user()->id) {
            return redirect()->route('admin.admins.index')->with('error', 'You cannot delete the last administrator and your account');
        }

        $admin->delete();
  
        return redirect()->route('admin.admins.index')->with('success', 'Admin deleted successfully');
    }
}
