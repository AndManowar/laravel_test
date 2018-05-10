<?php
/**
 * Created by PhpStorm.
 * User: manowartop
 * Date: 09.05.2018
 * Time: 13:38
 */

namespace App\Components\Rbac\Contracts;

use App\Components\Rbac\Models\PermissionGroup;
use App\Components\Rbac\Models\Role;

/**
 * Class RbacInterface
 * @package App\Components\Rbac\Interfaces
 */
interface RbacInterface
{
    /**
     * Check is role in permission group
     *
     * @param Role $role
     * @param PermissionGroup $permissionGroup
     * @return boolean
     */
    public function isRoleInPermissionGroup($role, $permissionGroup);

    /**
     * Add or remove role from group
     *
     * @param integer $roleId
     * @param integer $groupId
     * @param boolean $isAttach
     * @return void
     */
    public function changeRoleGroup($roleId, $groupId, $isAttach);

    /**
     * Get all routes uri
     *
     * @return array
     */
    public function getRoutesWithoutPermissions();

    /**
     * Set Permission To Permission Group
     *
     * @param integer $groupId
     * @param string $permissionName
     * @param $rbacRepository
     * @return void
     */
    public function setPermissionToGroup($groupId, $permissionName, $rbacRepository);

    /**
     * Check if guest permission group is specified
     *
     * @return bool
     */
    public function isGuestPermissionGroupPresent();
}