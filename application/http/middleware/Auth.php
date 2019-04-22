<?php

namespace app\http\middleware;

class Auth
{
    public function handle($request, \Closure $next)
    {
        if (!session('?user')) {
            session(null);
            return redirect(url('login'));
        }
        return  $next($request);
    }
}
