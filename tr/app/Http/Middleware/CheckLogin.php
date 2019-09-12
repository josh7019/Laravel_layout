<?php

namespace App\Http\Middleware;

use Closure;
use App\library\TokenTool;

class CheckLogin
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
        $sToken = $request->cookie('token');
        $oTokenTool = new TokenTool;
        if (!$sToken) {
            return redirect('guest/login');
        }
        if (!$oTokenTool->checkToken($sToken)) {
            setcookie ("token", "", time()-100, '/');
            return redirect('guest/login');
        }
        return $next($request);
    }
}
