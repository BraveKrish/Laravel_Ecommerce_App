<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::check() == true){
            if(Auth::user()->role == 'admin'){
                return $next($request);
            }
        }

        // return $next($request);
        return redirect('/')->with('error','You are not authorized to access this page');
        // return response()->json([
        //     'message' => 'You are not authorized to access this page'
        // ], 403);
    }
}
