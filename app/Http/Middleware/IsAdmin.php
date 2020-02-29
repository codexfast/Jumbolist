<?php

namespace App\Http\Middleware;

use Closure;
use DB;

class IsAdmin
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
        $isAdmin = false;

        if ($request->session()->has('admin_on'))
        {
            $isAdmin = true;
        }

        if( ! $isAdmin )
        {
            if ($request->ajax()) {
                return response('Unauthorized.', 401);
            } else {
                return redirect('/login');
            }
        }

        return $next($request);
    }
}
