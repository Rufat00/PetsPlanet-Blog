<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AllowedAccessUsers
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        if(auth()->user()?->role->permission_access_users !== 1){
            return back()->withErrors(['allowed' => 'You are not allowed to access users']);
        };

        return $next($request);
    }
}
