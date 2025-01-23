<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function set(Request $request)
    {
        if ($request->name && $request->value)
        {
            $request->session()->put($request->name, $request->value);
        }

        return true;
    }
}

