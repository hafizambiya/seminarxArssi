<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CekPeserta
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $rules): Response
    {
        if (!Auth::check()) {
            return redirect('login');
        }

        $user = Auth::user();
        if ($user->level == $rules) {
            return $next($request);
        }

        return redirect('login')->with('error', "kamu tidak punya akses");
    }
}
