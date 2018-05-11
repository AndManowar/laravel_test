<?php
/**
 * Created by PhpStorm.
 * User: manowartop
 * Date: 09.05.2018
 * Time: 13:38
 */

namespace App\Components\Rbac;

use App\Components\Rbac\Contracts\RbacInterface;
use App\Components\Rbac\Repositories\RbacRepository;
use App\Components\Rbac\Models\Permission;
use App\Components\Rbac\Models\PermissionGroup;
use App\Components\Rbac\Models\Role;
use App\Components\Admin\Models\Admin;;;
use App\Components\User\Models\User;;
use Illuminate\Routing\Route;

/**
 * Class Rbac
 * @package App\Components\Rbac
 */
class Rbac implements RbacInterface
{
    /**
     * Check is role in permission group
     *
     * @param Role $role
     * @param PermissionGroup $permissionGroup
     * @return boolean
     */
    public function isRoleInPermissionGroup($role, $permissionGroup)
    {
        $roles = $permissionGroup->roles()->pluck('name', 'id')->all();

        return array_key_exists($role->getKey(), $roles);
    }

    /**
     * Add or remove role from group
     *
     * @param integer $roleId
     * @param integer $groupId
     * @param boolean $isAttach
     * @return void
     */
    public function changeRoleGroup($roleId, $groupId, $isAttach)
    {
        /**
         * @var PermissionGroup $group
         */
        $group = PermissionGroup::query()->findOrFail($groupId);

        if ($isAttach) {
            $group->attachRole($roleId);
        } else {
            $group->detachRole($roleId);
        }
    }

    /**
     * Get all routes uri
     *
     * @return array
     */
    public function getRoutesWithoutPermissions()
    {
        $existingPermissions = [];

        /** @var PermissionGroup $permissionGroup */
        foreach (PermissionGroup::query()->get()->all() as $permissionGroup) {
            array_push($existingPermissions, $permissionGroup->permissions()->pluck('name', 'id')->all());
        }

        $existingPermissions = array_flatten($existingPermissions);

        return array_diff(
            collect(\Route::getRoutes())->map(function ($route) {
                /** @var Route $route */
                return $route->getName();
            })->all(),
            $existingPermissions);
    }

    /**
     * Set Permission To Permission Group
     *
     * @param integer $groupId
     * @param string $permissionName
     * @param $rbacRepository
     * @return void
     */
    public function setPermissionToGroup($groupId, $permissionName, $rbacRepository)
    {
        /**
         * @var RbacRepository $rbacRepository
         */
        $attributes = [
            'name' => $permissionName,
            'slug' => $permissionName,
        ];

        $permissionGroup = $rbacRepository->getRbacModel(PermissionGroup::class, $groupId);
        $permission = $rbacRepository->createRbacModelAndGetInstance($attributes, Permission::class);

        $permissionGroup->attachPermission($permission);
    }

    /**
     * Check if guest permission group is specified
     *
     * @return bool
     */
    public function isGuestPermissionGroupPresent()
    {
        return collect(PermissionGroup::query()->get()->all())->contains(function ($group) {
            return preg_match('/guest/ui', $group->name);
        });
    }

    /**
     * Check if user has permission to current operation
     *
     * @param string $slug
     * @param null|Admin|User $user
     * @return bool
     */
    public function canDo($slug, $user = null)
    {
        $permissions = $user ? $this->getUserPermissions($user) : $this->getGuestPermissions();

        return in_array($slug, array_flatten($permissions));
    }

    /**
     * Get user permissions
     *
     * @param User|Admin $user
     * @return array
     */
    private function getUserPermissions($user)
    {
        return collect($user->roles)->map(function ($role) {
            /** @var Role $role */
            return collect($role->permissionGroups)->map(function ($group) {
                /** @var PermissionGroup $group */
                return collect($group->permissions)->map(function ($permission) {
                    return $permission->name;
                })->all();
            })->all();
        })->all();
    }

    /**
     * Get guest permissions
     *
     * @return array
     */
    private function getGuestPermissions()
    {
        $guestGroup = array_filter(collect(PermissionGroup::query()->get()->all())->map(function ($group) {
            return preg_match('/guest/ui', $group->name) ? $group : '';
        })->all());

        if (empty($guestGroup)) {
            return [];
        }

        return collect($guestGroup)->map(function ($group) {
            /** @var PermissionGroup $group */
            return collect($group->permissions)->map(function ($permission) {
                return $permission->name;
            })->all();
        })->all();
    }
}