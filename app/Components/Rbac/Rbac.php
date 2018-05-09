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
use YaroslavMolchan\Rbac\Models\Permission;
use YaroslavMolchan\Rbac\Models\PermissionGroup;
use YaroslavMolchan\Rbac\Models\Role;

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
        $group = PermissionGroup::findOrFail($groupId);

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
                return $route->uri;
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
}