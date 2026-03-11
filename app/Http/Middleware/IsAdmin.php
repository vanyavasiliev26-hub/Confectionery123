<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;

class IsAdmin
{
    public function handle(Request $request, Closure $next)
    {

    if (auth()->check() && auth()->user()->is_admin) {
        return $next($request);
    }
        

        return redirect('/')->with('error', 'У вас нет доступа к этой странице');
    }
}