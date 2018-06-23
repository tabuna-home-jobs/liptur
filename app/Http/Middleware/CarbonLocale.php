<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;
use Illuminate\Support\Facades\App;
use Jenssegers\Date\Date;

class CarbonLocale
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
        Carbon::setLocale(App::getLocale());
        Date::setLocale(App::getLocale());

        return $next($request);
    }
}
