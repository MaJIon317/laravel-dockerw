<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Lockout;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\View\View;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    /**
     * Display a login form.
     *
     * @return \Illuminate\Http\Response
    */
    public function login(): View
    {
        return view('admin.login');
    }

    /**
     * Store a new admin.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
    */
    public function loginExecute(Request $request): RedirectResponse
    {
        $ensureIsNotRateLimited = $this->ensureIsNotRateLimited($request);

        if ($ensureIsNotRateLimited) {
            return back()->withErrors([
                'email' => $ensureIsNotRateLimited,
            ]);
        }

        $credentials = $request->validate([
            'email'     => 'required|email',
            'password'  => 'required|min:6'
        ]);

        if (Auth::guard('admin')->attempt($credentials))
        {
            $request->session()->regenerate();

            RateLimiter::clear($this->throttleKey($request));

            return redirect()->route('admin.dashboard');
        }

        RateLimiter::hit($this->throttleKey($request));

        return back()->withErrors([
            'email' => __('admin/login.error'),
        ]);
    }

   /**
     * Ensure the login request is not rate limited.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function ensureIsNotRateLimited(Request $request)
    {
        if (!RateLimiter::tooManyAttempts($this->throttleKey($request), $perMinute = 3)) {
            return;
        }
 
        event(new Lockout($request));
  
        $seconds = RateLimiter::availableIn($this->throttleKey($request));

        if ($seconds) {
            return trans('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]);
        }

        return false;
    }

    /**
     * Get the rate limiting throttle key for the request.
     */
    public function throttleKey(Request $request): string
    {
        return Str::transliterate(Str::lower($request->input('email')) . '|' . $request->ip());
    }

    /**
     * Destroy an authenticated session.
     */
    public function logout(Request $request): RedirectResponse
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect(route('admin.login'));
    }
 }