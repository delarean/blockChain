<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;

class LKAuth
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

        if(!(new User)->isLogin())
            return response("Для просмотра этой страницы нужно войти");

        return $next($request);
    }
}
