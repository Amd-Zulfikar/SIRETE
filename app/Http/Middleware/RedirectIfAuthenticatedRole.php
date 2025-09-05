<?php

namespace App\Http\Middleware;


use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class RedirectIfAuthenticatedRole
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            $role = Auth::user()->role;
            switch ($role) {
                case 'admin':
                    return Redirect::route('admin.dashboard');
                case 'drafter':
                    return Redirect::route('drafter.dashboard');
                case 'checker':
                    return Redirect::route('checker.dashboard');
                default:
                    return Redirect::route('login');
            }
        }
        return $next($request);
    }
}
