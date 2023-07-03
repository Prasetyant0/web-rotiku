<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

use Closure;
use Illuminate\Http\Request;

class Authenticate 
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        // die("Sebagai User");
        // jika data session itu user/customer
        // maka masuk ke hal frontend

        if (! $request->expectsJson()) {
            return route('login');
        }

    }


      public function handle(Request $request, Closure $next)
      {

        if (!$request->user()) {
            abort(403, 'Anda Belum Login!');
            die("Anda belum login");
        }
        if (!$request->user()->isUser()) {
            // return view('layoutsFrontend.pagesMenuRoti.notif');
            abort(403, 'Anda Bukan User!');
            die("Anda bukan user");
        }

        // jika rolenya itu admin
        // maka masuk ke dalam hal admin
        return $next($request);
      }
}
