<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AllowedAccessImages
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

        if(auth()->user()?->role->permission_access_images !== 1){
            return back()->withErrors(['allowed' => 'You are not allowed to access images']);
        };

        return $next($request);
    }
}
