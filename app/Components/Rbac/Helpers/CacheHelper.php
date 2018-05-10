<?php

namespace App\Components\Rbac\Helpers;

use App\Components\Rbac\Models\Role;

/**
 * Class CacheHelper
 * @package YaroslavMolchan\Rbac\Helpers
 */
class CacheHelper
{

    /**
     * @param Role $role
     * @return mixed
     */
    static function get($role)
    {
        $key = $role->getCacheKey();
        if (false === \Cache::has($key)) {
            $permissions = $role->permissions()->pluck('slug')->toArray();
            \Cache::forever($key, $permissions);
        }

        return \Cache::get($key);
    }

    /**
     * @param Role $role
     */
    static function clear($role)
    {
        \Cache::forget($role->getCacheKey());
    }
}