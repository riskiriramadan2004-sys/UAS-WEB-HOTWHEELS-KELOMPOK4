<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAdmin
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!session()->has('user')) {
            return redirect('/login')->with('error', 'Silakan login terlebih dahulu');
        }

        if (session('user.role') !== 'admin') {
            return redirect('/dashboard')->with('error', 'Anda tidak memiliki akses admin');
        }

        return $next($request);
    }
}