<?php
/**
 * Created by PhpStorm.
 * User: manowartop
 * Date: 10.05.2018
 * Time: 19:01
 */

namespace App\Components\Rbac\Middlewares;

use App\Components\Rbac\Facades\RbacFacade;
use Auth;
use Closure;

/**
 * Class RbacMiddlewareFront
 * @package App\Components\Rbac\Middlewares
 */
class RbacMiddlewareFront
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

        if (!RbacFacade::canDo($request->route()->getName(), Auth::guard('web')->user())) {
            abort(403, 'Доступ запрещен!');
        }

        return $next($request);
    }
}