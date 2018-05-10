<?php

namespace App\Components\Rbac\Models;

use App\Models\DB\Admin;
use App\Models\DB\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;
use App\Components\Rbac\Helpers\CacheHelper;

/**
 * Class Role
 * @package App\Components\Rbac\Models
 *
 * @property string $slug
 * @property string $name
 *
 * @property User[] $users
 * @property Admin[] $admins
 * @property Permission[] $permissions
 * @property PermissionGroup[] $permissionGroups
 *
 */
class Role extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['slug', 'name'];

    /**
     * @return string
     */
    public function getCacheKey()
    {
        return 'role_' . $this->slug;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function admins()
    {
        return $this->belongsToMany(Admin::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function permissionGroups()
    {
        return $this->belongsToMany(PermissionGroup::class);
    }

    /**
     * Attach permission to role
     *
     * @param int|Permission $permission
     */
    public function attachPermission($permission)
    {
        $this->permissions()->attach($permission);
        CacheHelper::clear($this);
    }

    /**
     * Attach array of permissions to role
     *
     * @param array $permissions array of Permission objects or id
     */
    public function attachPermissions($permissions)
    {
        foreach ($permissions as $permission) {
            $this->attachPermission($permission);
        }
    }

    /**
     * Detach permission from role
     *
     * @param int|Permission $permission
     */
    public function detachPermission($permission)
    {
        $this->permissions()->detach($permission);
        CacheHelper::clear($this);
    }

    /**
     * @param array $permissions array of Permission objects or id
     */
    public function detachPermissions($permissions)
    {
        foreach ($permissions as $permission) {
            $this->detachPermission($permission);
        }
    }

    /**
     * Attach group to role
     *
     * @param PermissionGroup $group
     */
    public function attachGroup($group)
    {
        if (!($group instanceof PermissionGroup) && ctype_digit($group)) {
            $group = PermissionGroup::query()->find($group);
        }

        $this->permissionGroups()->attach($group);

        foreach ($group->permissions as $permission) {
            try {
                $this->attachPermission($permission);
            } catch (QueryException $e) {
                //Catch "UNIQUE constraint failed" exceptions, may be groups with the same permissions
                //And when it happens we get error, but now we skip it and continue working
            }
        }
    }

    /**
     * Detach Permission Group from role
     *
     * @param PermissionGroup $group
     */
    public function detachGroup($group)
    {
        if (!($group instanceof PermissionGroup) && ctype_digit($group)) {
            $group = PermissionGroup::query()->find($group);
        }

        $this->permissionGroups()->detach($group);

        foreach ($group->permissions as $permission) {
            $this->detachPermission($permission);
        }
    }

    /**
     * Get permissions array
     *
     * @return array
     */
    public function permissionsArray()
    {
        return CacheHelper::get($this);
    }
}
