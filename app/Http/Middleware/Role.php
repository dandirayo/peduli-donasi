<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ... $roles)
    {
        foreach($roles as $role) {
            if($role == 'notAdmin') {
                if (Auth::user() == null) return $next($request);
                else {
                    $user = Auth::user();
                    if($user->checkRole($role)) return $next($request);
                    return abort(403);
                }
            }
        }

        foreach($roles as $role) {
            $user = Auth::user();
            if($user->checkRole($role)) return $next($request);
        }

        return abort(403);
    }
}
