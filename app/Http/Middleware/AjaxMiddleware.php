<?php

namespace App\Http\Middleware;

use Closure;
use Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Class AjaxMiddleware
 * @package App\Http\Middleware
 */
class AjaxMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!Request::ajax()) {
            throw new NotFoundHttpException();
        }

        return $next($request);
    }
}
