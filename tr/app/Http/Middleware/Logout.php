<?php

namespace App\Http\Middleware;

use Closure;

class Logout
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        setcookie ("token", "", time()-100, '/');
        return redirect('/guest/sign');
    }
}
