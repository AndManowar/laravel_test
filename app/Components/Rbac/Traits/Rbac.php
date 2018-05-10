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
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles()
    {
        /** @var User|Admin $model */
        $model = $this;

        $tableName = $model instanceof User ? 'role_user' : 'role_admin';

        return $model->belongsToMany(Role::class, $tableName);
    }
}