<?php

namespace App\Components\Rbac\Traits;

use App\Components\Rbac\Models\Role;
use App\Components\User\Models\User;
use Illuminate\Database\Eloquent\Collection;

;

/**
 * Trait Rbac
 * @package YaroslavMolchan\Rbac\Traits
 *
 * @property Collection $roles
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

    /**
     * Attach role to user
     *
     * @param integer $roleId
     */
    public function attackRole($roleId)
    {
        if ($this->getRole()->id != $roleId) {
            $this->roles()->detach([$this->getRole()->id]);
            $this->roles()->attach($roleId);
        }
    }
}