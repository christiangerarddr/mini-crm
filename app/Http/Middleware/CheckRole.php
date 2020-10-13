<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CheckRole
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
        $userRoles = Auth::user()->roles->pluck('name');

        if(!$userRoles->contains('Admin')){
            return redirect()->route('dashboard');
        }

        return $next($request);
    }
}
