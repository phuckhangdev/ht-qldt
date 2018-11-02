<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $roles, $permission = null)
    {
        /* if (Auth::guest()) {
            return redirect('/login');
        } */
/*         $user = Auth::user();
        if($user->isAdmin())
            return $next($request); */
        
        if(!$request->user()->hasRole($roles)) {
            abort(404);
        }
        if($permission !== null && !$request->user()->can($permission)) {
            abort(404);
        }
        return $next($request);
    }
}
