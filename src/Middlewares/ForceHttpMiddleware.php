<?php


namespace Benjaber98\LaravelHttps\Middlewares;

use Closure;
use \Illuminate\Http\Request;

class ForceHttpMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(app()->environment() == 'testing') {
            return $next($request);
        }

        if(app()->environment() == 'local' && ! config('https.force_in_local')) {
            return $next($request);
        }

        if (!$request->secure()) {
            return redirect()->secure($request->getRequestUri());
        }

        return $next($request);

    }
}
