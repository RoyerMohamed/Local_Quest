<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
      if (Auth::user()->role->role_name == "admin" ) {
        return $next($request);
      }
      dd(Auth::user() );
      
        // Redirigez l'utilisateur s'il n'a pas le rôle requis
        return redirect('/')->response()->json(['message' => 'Accès non autorisé.'], 404);
       // return redirect('/')->with('error', 'Accès non autorisé.');
    }
}
