<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $users = User::adminFilter($request)->orderByDesc('created_at')->paginate(config('admin.limit'))->withQueryString();

        return view('admin.users', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $action = route('admin.users.store');

        return view('admin.user-form', compact('action'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserCreateRequest $request)
    {
        User::create($request->all());

        return redirect()->route('admin.users.index')->with('success', 'User added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $action = route('admin.users.update', $user);

        return view('admin.user-form', compact('user', 'action'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserUpdateRequest $request, User $user)
    {
        if (!$request->input('password')) {
            $request->request->remove('password');
        }

        $request->request->set('email_verified_at', $request->request->get('email_verified_at') ? ($user->email_verified_at ?? Carbon::now()->timestamp) : null);
        $request->request->set('send_welcome', (int)$request->request->get('send_welcome'));

        $user->update($request->all());
  
        return redirect()->route('admin.users.index')->with('success', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
  
        return redirect()->route('admin.users.index')->with('success', 'User deleted successfully');
    }
}
