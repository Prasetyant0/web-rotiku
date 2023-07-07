<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use RealRashid\SweetAlert\Facades\Alert;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            Alert::info('Anda belum login!', 'Silahkan login terlebih dahulu.')->persistent(true)->autoclose(3000);
            return route('login.admin');
        }
    }


    //   public function handle(Request $request, Closure $next)
    //   {
    //     if (!$request->user()) {
    //         abort(403, 'Anda Belum Login!');
    //         sleep(1);
    //         return redirect()->route('login');
    //     }
    //     if (!$request->user()->isUser()) {
    //         abort(403, 'Anda Bukan User!');
    //         die("Anda bukan user");
    //     }

    //         return $next($request);
    //   }
}
