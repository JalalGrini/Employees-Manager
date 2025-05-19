<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckEmployeSession
{
    public function handle(Request $request, Closure $next)
    {
        if (!$request->session()->has('employe_id')) {
            return redirect('/login');
        }
        return $next($request);
    }
}