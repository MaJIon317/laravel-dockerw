<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class CookieController extends Controller
{
    public function set(Request $request)
    {
        if ($request->name && $request->value)
        {
            Cookie::queue($request->name, $request->value, 10080);
        }

        return true;
    }
}
