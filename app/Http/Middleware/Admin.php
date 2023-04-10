<?php

namespace App\Http\Middleware;

use Closure;

class Admin
{
    public function handle($request, Closure $next)
    {
        if (auth()->user()->role !== '1') {
            return redirect('dashboard');
        }
        return $next($request);
    }
}
