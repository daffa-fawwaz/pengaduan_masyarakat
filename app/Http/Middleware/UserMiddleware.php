<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::check()){
            if(Auth::user()->role == "user") {
                return $next($request);
            }else {
                return redirect('/')->with('message', 'Akses User Ditolak');
        }
        }else {
            return redirect('/login')->with('message', 'Silahkan Login !');
        }
        return $next($request);
    }
}
