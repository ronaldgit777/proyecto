<?php

namespace App\Http\Middleware;

namespace App\Http\Middleware\adminmiddleware;
use Closure;
use Illuminate\Http\Request;

class secretariamiddleware
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
        if(auth()->user()->role == 'secretaria')
        return $next($request);
        return redirect('/home');
    }
}
