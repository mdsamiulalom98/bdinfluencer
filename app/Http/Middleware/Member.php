<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;
class Member
{
    public function handle($request, Closure $next)
    {
        if (Auth::guard('member')->user()){
            return $next($request);
        }
        return redirect()->route('member.login');
    }
}
