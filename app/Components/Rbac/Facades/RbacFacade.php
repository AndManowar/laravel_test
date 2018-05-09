<?php
/**
 * Created by PhpStorm.
 * User: manowartop
 * Date: 09.05.2018
 * Time: 13:37
 */

namespace App\Components\Rbac\Facades;

use App\Components\Rbac\Contracts\RbacInterface;
use Illuminate\Support\Facades\Facade;

/**
 * Class RbacFacade
 * @package App\Components\Rbac\Facades
 */
class RbacFacade extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return RbacInterface::class;
    }
}