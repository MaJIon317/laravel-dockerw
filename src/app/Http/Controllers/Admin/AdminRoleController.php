<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdminRole;
use App\Http\Requests\AdminRoleRequest as Request;
use Illuminate\Support\Facades\Route;

class AdminRoleController extends Controller
{
    private function getRoutes()
    {
        $routes = array();

        foreach (Route::getRoutes() as $route) {
            if (preg_match('/^\/?admin/', $route->getName()) && !in_array($route->getName(), [
                'admin.login',
                'admin.login.execute',
                'admin.logout',
            ])) {

                $routes[] = $route->getName();
            }
        }

        return $routes;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $adminRoles = AdminRole::paginate(config('admin.limit'));

        return view('admin.admin-roles', compact('adminRoles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $action = route('admin.admin-roles.store');

        $routes = $this->getRoutes();

        return view('admin.admin-role-form', compact('action', 'routes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        AdminRole::create($request->all());

        return redirect()->route('admin.admin-roles.index')->with('success', 'Admin Role added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(AdminRole $adminRole)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AdminRole $adminRole)
    {
        $action = route('admin.admin-roles.update', $adminRole);

        $routes = $this->getRoutes();

        return view('admin.admin-role-form', compact('adminRole', 'action', 'routes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AdminRole $adminRole)
    {
        $adminRole->update($request->all());
  
        return redirect()->route('admin.admin-roles.index')->with('success', 'Admin Role updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AdminRole $adminRole)
    {
        $count = AdminRole::count();

        if ($count <= 1) {
            return redirect()->route('admin.admin-roles.index')->with('error', 'You cannot delete the last user group');
        }

        $adminRole->delete();
  
        return redirect()->route('admin.admin-roles.index')->with('success', 'Admin Role deleted successfully');
    }
}
