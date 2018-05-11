<?php
/**
 * Created by PhpStorm.
 * User: manowartop
 * Date: 08.05.18
 * Time: 14:03
 */

namespace App\Components\Rbac\Repositories;

use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use App\Components\Rbac\Models\Permission;
use App\Components\Rbac\Models\PermissionGroup;
use App\Components\Rbac\Models\Role;

/**
 * Class RbacRepository
 * @package App\Components\Rbac\Repositories
 */
class RbacRepository
{
    /**
     * Get rbac model by id or create new
     *
     * @param null|integer $id
     * @param string $className
     * @return Model|Role|Permission|PermissionGroup
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
    public function createRbacModel(array $attributes, $className)
    {
        return $this->getRbacModel($className)->fill($attributes)->save();
    }

    /**
     * Create model and return it
     *
     * @param array $attributes
     * @param string $className
     * @return Model|Role|Permission|PermissionGroup
     */
    public function createRbacModelAndGetInstance(array $attributes, $className)
    {
        $model = $this->getRbacModel($className)->fill($attributes);

        if (!$model->save()) {
            throw new BadRequestHttpException();
        }

        return $model;
    }

    /**
     * Update rbac model
     *
     * @param integer $id
     * @param array $attributes
     * @param string $className
     * @return bool
     */
    public function updateRbacModel($id, array $attributes, $className)
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
        $model = $this->getRbacModel($className, $id);

        if ($model instanceof PermissionGroup && !empty($model->permissions->all())) {
            return false;
        }

        return $this->getRbacModel($className, $id)->delete();
    }

    /**
     * Get permission groups for dropdown list
     *
     * @return \Illuminate\Support\Collection
     */
    public function getPermissionGroupList()
    {
        return PermissionGroup::query()->pluck('name', 'id');
    }
}