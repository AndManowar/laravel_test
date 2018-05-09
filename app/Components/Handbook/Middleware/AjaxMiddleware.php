<?php

namespace App\Components\Handbook\Middleware;

use Closure;
use Request;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

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
     * @throws BadRequestHttpException
     */
    public function handle($request, Closure $next)
    {
        if (!Request::ajax()) {
            throw new BadRequestHttpException('Request is not ajax');
        }

        return $next($request);
    }
}
