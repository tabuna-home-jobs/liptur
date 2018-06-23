<?php

namespace App\Http\Middleware;

use Closure;

class PublicRedirect
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (stripos($request->fullUrl(), 'public')) {
            $url = str_replace("/public", "", $request->fullUrl());

            return redirect()->to($url);
        }

        return $next($request);
    }
}
