<?php

namespace App\Http\Middleware;

use App\Helpers\GlobalHelper;
use Closure;

class AdminAuthenticationMiddleware
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
        if(GlobalHelper::checkAdmin()){
            return $next($request);
        }

        return redirect(route('homepage'));
    }
}
