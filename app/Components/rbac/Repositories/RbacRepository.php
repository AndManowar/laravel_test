<?php
/**
 * Created by PhpStorm.
 * User: manowartop
 * Date: 08.05.18
 * Time: 14:03
 */

namespace App\Components\rbac\Repositories;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use YaroslavMolchan\Rbac\Models\Permission;
use YaroslavMolchan\Rbac\Models\PermissionGroup;
use YaroslavMolchan\Rbac\Models\Role;

/**
 * Class RbacRepository
 * @package App\Components\rbac\Repositories
 */
class RbacRepository
{
    /**
     * Get rbac model by id or create new
     *
     * @param null|integer $id
     * @param string $className
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function getRbacModel($className, $id = null)
    {
        switch ($className) {
            case Role::class:
                return Role::query()->findOrNew($id);
                break;
            case Permission::class:
                return Permission::query()->findOrNew($id);
                break;
            case PermissionGroup::class:
                return PermissionGroup::query()->findOrNew($id);
                break;
            default:
                throw new NotFoundHttpException();
                break;
        }
    }

    /**
     * Create new rbac model
     *
     * @param array $attributes
     * @param string $className
     * @return bool
     */
    public function createRbacModel($attributes, $className)
    {
        return $this->getRbacModel($className)->fill($attributes)->save();
    }

    /**
     * Update rbac model
     *
     * @param integer $id
     * @param array $attributes
     * @param string $className
     * @return bool
     */
    public function updateRbacModel($id, $attributes, $className)
    {
        return $this->getRbacModel($className, $id)->fill($attributes)->save();
    }

    /**
     * Delete rbac model
     *
     * @param integer $id
     * @param string $className
     * @return bool|null
     * @throws \Exception
     */
    public function deleteRbacModel($id, $className)
    {
        return $this->getRbacModel($className, $id)->delete();
    }
}