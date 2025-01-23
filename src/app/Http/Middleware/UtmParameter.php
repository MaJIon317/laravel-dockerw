<?php

namespace App\Http\Middleware;

use Closure;
use App\Jobs\ConstructorEmailTrackJob;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

class UtmParameter
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (($request->header('x-livewire') === null && !Str::contains($request->header('referer'), config('app.url'), ignoreCase: true)/* && ! */)) {
            $currentRequestParameter = $this->getParameter($request);
    
            $sessionParameter = session(config('general.utm_session_key', 'utm'));

            if ((!empty($currentRequestParameter) && empty($sessionParameter)) || (!empty($currentRequestParameter) && ($currentRequestParameter !== $sessionParameter))) {
                session([config('general.utm_session_key', 'utm') => $currentRequestParameter]);
            }
 
            if ($request->get('messageId') && (session('messageId') != $request->get('messageId'))) {
                ConstructorEmailTrackJob::dispatch($request->get('messageId'), $request->url());
                session(['messageId' => $request->get('messageId')]);
            }
        }

        return $next($request);
    }
    
    /**
     * Retrieve all UTM-Parameter from the URI.
     *
     * @return array
     */
    protected function getParameter(Request $request)
    {
        $allowedKeys = config('general.utm_allowed', [
            'utm_source', 'utm_medium', 'utm_campaign', 'utm_term', 'utm_content'
        ]);

        return collect($request->all())
            ->filter(fn ($value, $key) => substr($key, 0, 4) === 'utm_')
            ->filter(fn ($value, $key) => in_array($key, $allowedKeys))
            ->mapWithKeys(fn ($value, $key) => [
                htmlspecialchars($key, ENT_QUOTES, 'UTF-8') => htmlspecialchars($value, ENT_QUOTES, 'UTF-8')
            ])
            ->toArray();
    }
}
