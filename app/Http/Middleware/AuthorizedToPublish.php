<?php

namespace App\Http\Middleware;

use Alert;
use Closure;
use Illuminate\Support\Facades\Auth;

class AuthorizedToPublish
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function __construct() {
        dd("construct");
    }
    public function handle($request, Closure $next)
    {
        dd('yep');
        return $next($request);
    }
}
