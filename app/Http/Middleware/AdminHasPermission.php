<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminHasPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next,string $permission): Response
    {
        if (!auth()->check() || !auth()->user()->can($permission)) {
            return redirect()->back()->with('warning', 'You are not allowed to access this process');
        }

        return $next($request);

    }
}
