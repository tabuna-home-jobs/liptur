<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;

class CacheResponse
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
        $response = $next($request);
        $time = Carbon::now();


        $response->setMaxAge(3600);
        $response->setLastModified($time->subMinutes(5));
        $response->setExpires($time->addMinute(15));

        return $response;
    }
}
