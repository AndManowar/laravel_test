<?php

namespace App\Components\Rbac\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;

/**
 * Class PermissionGroup
 * @package App\Components\Rbac\Models
 *
 * @property Role[] $roles
 * @property Permission[] $permissions
 */
class PermissionGroup extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['name', 'module'];

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
    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

    /**
     * Attach role to group
     *
     * @param int|Role $role
     */
    public function attachRole(Role $role)
    {
        if (!($role instanceof Role) && ctype_digit($role)) {
            $role = Role::query()->find($role);
        }

        $this->roles()->attach($role);

        foreach ($this->permissions as $permission) {
            try {
                $role->attachPermission($permission);
            } catch (QueryException $e) {
                //Catch "UNIQUE constraint failed" exceptions, may be groups with the same permissions
                //And when it happens we get error, but now we skip it and continue working
            }
        }
    }

    /**
     * Detach Role from Permission Group
     *
     * @param int|Role $role
     */
    public function detachRole($role)
    {
        if (!($role instanceof Role) && ctype_digit($role)) {
            $role = Role::query()->find($role);
        }

        $this->roles()->detach($role);

        foreach ($this->permissions as $permission) {
            $role->detachPermission($permission);
        }
    }

    /**
     * Attach Permission to Permission Group
     *
     * @param int|Permission $permission
     */
    public function attachPermission($permission)
    {
        if (!($permission instanceof Permission) && ctype_digit($permission)) {
            $permission = Permission::query()->find($permission);
        }

        $this->permissions()->attach($permission);

        foreach ($this->roles as $role) {
            /** @var Role $role */
            try {
                $role->attachPermission($permission);
            } catch (QueryException $e) {
                //Catch "UNIQUE constraint failed" exceptions, may be groups with the same permissions
                //And when it happens we get error, but now we skip it and continue working
            }
        }
    }

    /**
     * Detach Permission from Permission Group
     *
     * @param int|Permission $permission
     */
    public function detachPermission($permission)
    {
        if (!($permission instanceof Permission) && ctype_digit($permission)) {
            $permission = Permission::query()->find($permission);
        }

        $this->permissions()->detach($permission);

        foreach ($this->roles as $role) {
            /** @var Role $role */
            $role->detachPermission($permission);
        }
    }
}
