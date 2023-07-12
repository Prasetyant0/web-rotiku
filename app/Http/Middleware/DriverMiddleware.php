<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class DriverMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
       if (Auth::check()) {
       $user = Auth::user();
       if ($user->role === 'driver') {
       Alert::info('Anda bukan driver!', 'Silahkan akses halaman driver dengan akun yang
       sesuai.')->persistent(true)->autoclose(3000);
       return redirect()->route('menu');
       }
       }

       Alert::info('Anda belum login!', 'Silahkan login terlebih dahulu.')->persistent(true)->autoclose(3000);
       return redirect('/login');
    }
}
