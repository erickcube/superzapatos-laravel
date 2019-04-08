<?php

namespace App\Http\Middleware;

use Closure;

class HttpBasicAuth
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
        $wired_user = 'my_user';
        $wired_pass = 'my_password';
        header('Cache-Control: no-cache, must-revalidate, max-age=0');
        $credentials_exist = !(empty($_SERVER['PHP_AUTH_USER']) && empty($_SERVER['PHP_AUTH_PW']));
        $not_authenticated = (
            !$credentials_exist ||
            $_SERVER['PHP_AUTH_USER'] != $wired_user ||
            $_SERVER['PHP_AUTH_PW']   != $wired_pass
        );
        if ($not_authenticated) {
            return response()->json(['sucess' => false, 'error_code' => 401, 'error_msg' => 'Not authorized' ], 200);
        }
        return $next($request);
    }
}
