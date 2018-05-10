<?php

namespace App\Components\Rbac\Traits;

use App\Components\Rbac\Models\Role;
use App\Models\DB\User;

/**
 * Trait Rbac
 * @package YaroslavMolchan\Rbac\Traits
 *
 * @property Role[] $roles
 */
trait Rbac
{
    /**
     * @return mixed
     */
    public function roles()
    {
        /** @var User|Admin $model */
        $model = $this;

        $tableName = $model instanceof User ? 'role_user' : 'role_admin';

        return $model->belongsToMany(Role::class, $tableName);
    }

    /**
     * Check if user has permission to current operation
     *
     * @param string $slug
     * @return bool
     */
    public function canDo($slug)
    {
//        $permissions = [];
//        foreach ($this->roles as $role) {
//            $permissions = array_merge($permissions, $role->permissionsArray());
//        }
//        $permissions = array_unique($permissions);
//
//        return in_array($slug, $permissions);

        echo '<pre>';
        print_r(array_pop(collect($this->roles)->first()));
        die();
    }
}