<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EmailConstructor;
use App\Http\Requests\EmailConstructorRequest as Request;

class EmailConstructorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $emailConstructors = EmailConstructor::orderBy('created_at')->paginate(config('admin.limit'));

        return view('admin.email-constructors', compact('emailConstructors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $action = route('admin.email-constructor.store');

        return view('admin.email-constructor-form', compact('action'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $emailConstructor = EmailConstructor::create($request->all());

        $this->updateHtmlToUtm($request, $emailConstructor);

        return redirect()->route('admin.email-constructor.index')->with('success', 'Email constructor added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(EmailConstructor $emailConstructor)
    {
        return view('admin.email-constructor-show', compact('emailConstructor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EmailConstructor $emailConstructor)
    {
        $action = route('admin.email-constructor.update', $emailConstructor);

        return view('admin.email-constructor-form', compact('emailConstructor', 'action'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, EmailConstructor $emailConstructor)
    {
        $emailConstructor->update($request->all());
        
        $this->updateHtmlToUtm($request, $emailConstructor);

        return redirect()->route('admin.email-constructor.index')->with('success', 'Email constructor updated successfully');
    }

    public function updateHtmlToUtm(Request $request, EmailConstructor $emailConstructor)
    {
        $html = $request->get('html');

        // Добавляем Link на прочтение письма
        $html = str_replace(
            '</body>', 
            '<img src="' . config("app.url") . '/?pixel=pixel" width="1px" height="1px"></body>', 
            $html);
            
        $html = email_constructor_utms($html, [
            'email' => '([email])',
            'email_constructor_id' => '([email_constructor_id])'
        ]);

        $emailConstructor->update(attributes: [
            'html' => $html
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EmailConstructor $emailConstructor)
    {
        $emailConstructor->delete();
  
        return redirect()->route('admin.email-constructor.index')->with('success', 'Email constructor deleted successfully');
    }
}
