<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;


class AuthorizeUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role = ''): Response
    {
        $user = $request->user();  // ambil user yang sedang login
        if ($user->hasRole($role)) {
            return $next($request);
        }

        // Jika user tidak memiliki level yang sesuai, redirect ke halaman login
        abort(403, 'Forbidden. Kamu tidak punya akes ke halaman ini.');
    }
}