<?php

namespace App\Http\Middleware;

use Closure;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;

class ManagerMiddleware
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
        // 1. User should be authenticated
        // 2. User should be member of admin role

        if(Sentinel::check() && Sentinel::inRole('manager') || Sentinel::inRole('admin')  )
            return $next($request);
        else
            return redirect('/login');
    }
}
