<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class CRUDAuthStaff
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::user()) {
            // NUA = NovelUserAdmin || NU = NovelUser; CRUD = what actions can a user use
            if (Auth::user()->isAuthorized('NUA', 'CRUD') || Auth::user()->isAuthorized('NU', 'CRUD')) {
                return $next($request);
            } else {
                return redirect('/')->with('success', 'You don\'t have permission to access this.');
            }
        } else {
            return redirect('login');
        }
    }
}
