<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // if (!$request->user()) {
        //     abort(403, 'Anda Belum Login!');
        // }
        // if (!$request->user()->isAdmin()) {
        //     abort(403, 'Anda Bukan Admin!');
        // }

        if (Auth::check() && Auth::user()->role == 'admin') {
        return $next($request);
        }
        Alert::info('Anda bukan admin!', 'Silahkan login terlebih dahulu jika ingin akses halaman
        admin.')->persistent(true)->autoclose(5000);
        return redirect('/login');

        // jika rolenya itu admin
        // maka masuk ke dalam hal admin
        // return $next($request);
    }
}
