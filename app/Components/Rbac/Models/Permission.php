<?php

namespace App\Components\Rbac\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;

/**
 * Class Permission
 * @package App\Components\Rbac\Models
 *
 * @property Role[] $roles
 * @property PermissionGroup[] $groups
 */
class Permission extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['slug', 'name'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function groups()
    {
        return $this->belongsToMany(PermissionGroup::class);
    }

    /**
     * Attach Group to Permission
     *
     * @param int|PermissionGroup $group
     */
    public function attachGroup($group)
    {
        if (!($group instanceof PermissionGroup) && ctype_digit($group)) {
            $group = PermissionGroup::query()->findOrFail($group->getKey());
        }

        $this->groups()->attach($group);

        foreach ($group->roles as $role) {
            /** @var Role $role */
            try {
                $role->attachPermission($this);
            } catch (QueryException $e) {
                //Catch "UNIQUE constraint failed" exceptions, may be groups with the same permissions
                //And when it happens we get error, but now we skip it and continue working
            }
        }
    }

    /**
     * Detach Group from Permission
     *
     * @param int|PermissionGroup $group
     */
    public function detachGroup($group)
    {
        if (!($group instanceof PermissionGroup) && ctype_digit($group)) {
            $group = PermissionGroup::query()->find($group);
        }

        $this->groups()->detach($group);

        foreach ($group->roles as $role) {
            /** @var Role $role */
            $role->detachPermission($this);
        }
    }
}
