<?php
/**
 * Created by PhpStorm.
 * User: manowartop
 * Date: 11.05.18
 * Time: 11:12
 */

namespace App\Components\Admin\Repositories;

use App\Components\Admin\Models\Admin;

/**
 * Class AdminRepository
 * @package App\Components\Admin\Repositories
 */
class AdminRepository
{
    /**
     * Get admin or create new
     *
     * @param null|integer $id
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function getAdmin($id = null)
    {
        return Admin::query()->findOrNew($id);
    }

    /**
     * Create new admin
     *
     * @param array $attributes
     * @return bool
     */
    public function create(array $attributes)
    {
        return $this->getAdmin()->fill($attributes)->save();
    }

    /**
     * Update admin
     *
     * @param integer $id
     * @param array $attributes
     * @return bool
     */
    public function update($id, array $attributes)
    {
        /** @var Admin $admin */
        $admin = $this->getAdmin($id);

        $admin->fill($attributes);
        $admin->profile->fill($attributes);

        if (!$admin->save() || !$admin->profile->save()) {
            return false;
        }

        return true;
    }

    /**
     * Delete admin
     *
     * @param integer $id
     * @return bool|null
     * @throws \Exception
     */
    public function delete($id)
    {
        return $this->getAdmin($id)->delete();
    }
}