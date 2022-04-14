<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CustomrecepAuth
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
        $username = session()->get('username');

        if(!($username == "receptionist")){
            return redirect('owner/login');
        }
        return $next($request);
    }
}