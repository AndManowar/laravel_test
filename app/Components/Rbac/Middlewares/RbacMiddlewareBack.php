<?php
/**
 * Created by PhpStorm.
 * User: manowartop
 * Date: 09.05.2018
 * Time: 22:39
 */

namespace App\Components\Rbac\Middlewares;

use App\Components\Rbac\Facades\RbacFacade;
use App\Components\Admin\Models\Admin;;;
use Auth;
use Closure;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

/**
 * Class RbacMiddleware
 * @package App\Components\Rbac\Middlewares
 */
class RbacMiddlewareBack
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
        /** @var Admin $user */
        if (!$user = Auth::guard('admin')->user()) {
            return redirect(route('admin.login.form'));
        }

        if (!RbacFacade::canDo($request->route()->getName(), $user)) {
            abort(403, 'Доступ запрещен!');
        }

        return $next($request);
    }
}