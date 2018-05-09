<?php
/**
 * Created by PhpStorm.
 * User: manowartop
 * Date: 09.05.2018
 * Time: 22:39
 */

namespace App\Components\Rbac\Middlewares;

use App\Components\Rbac\Facades\RbacFacade;
use Closure;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

/**
 * Class RbacMiddleware
 * @package App\Components\Rbac\Middlewares
 */
class RbacMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Closure $next
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function handle($request, Closure $next)
    {
        if (!RbacFacade::isGuestPermissionGroupPresent()) {
            throw new BadRequestHttpException('GuestPermission Permission Group must be specified');
        }

        //TODO Logic

        return $next($request);
    }
}