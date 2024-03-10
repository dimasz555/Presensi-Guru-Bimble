<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckUserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    // public function handle(Request $request, Closure $next, $user, ... $roles): Response
    // {
    //     foreach ($roles as $role) {
    //         $user = auth()->user();
    //         if ($user->hasRole('admin')) { // Memeriksa apakah pengguna memiliki peran admin
    //             return redirect('/dashboard');
    //         } elseif ($user->hasRole('guru')) { // Memeriksa apakah pengguna memiliki peran guru
    //             return redirect('/presensi');
    //         }
    //     }
        
    //     return $next($request);
    // }
}
