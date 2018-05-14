<?php
/**
 * Created by PhpStorm.
 * User: manowartop
 * Date: 11.05.18
 * Time: 11:12
 */

namespace App\Components\Admin\Repositories;

use App\Components\Admin\Models\Admin;
use App\Components\Admin\Models\Profile;
use App\Components\FileUploader\Facades\FileUploader;
use Hash;

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
        /** @var Admin $admin */
        $admin = $this->getAdmin()->fill($attributes);
        $profile = new Profile();

        $admin->password = Hash::make($attributes['password']);
        $admin->roles()->attach($attributes['role']);
        $profile->fill($attributes);

        if (isset($attributes['image'])) {
            if (!FileUploader::uploadFile($attributes['image'], 'avatars')) {
                return false;
            }
            $profile->avatar = FileUploader::getUploadedFilePath();
        }

        if (!$admin->save()) {
            return false;
        }

        return $admin->profile()->save($profile);
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
        $admin->attackRole($attributes['role']);
        $admin->profile->fill($attributes);

        if (isset($attributes['image'])) {
            if (!FileUploader::uploadFile($attributes['image'], 'avatars')) {
                return false;
            }
            $admin->profile->avatar = FileUploader::getUploadedFilePath();
        }

        if (isset($attributes['newPassword'])) {
            $admin->password = Hash::make($attributes['newPassword']);
        }

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