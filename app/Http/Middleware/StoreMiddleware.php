<?php

namespace App\Http\Middleware;

use Closure;

class StoreMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Sentinel::check() && (Sentinel::getUser()->roles()->first()->slug =='manager' ||
                                 Sentinel::getUser()->roles()->first()->slug =='admin'))
            return $next($request);
        else
            return redirect('/login');
    }
}
