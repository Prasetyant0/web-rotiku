<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!$request->user()) {
            abort(403, 'Anda Belum Login!');
        }
        if (!$request->user()->isAdmin()) {
            abort(403, 'Anda Bukan Admin!');
        }

        // jika rolenya itu admin
        // maka masuk ke dalam hal admin
        return $next($request);
    }
}
