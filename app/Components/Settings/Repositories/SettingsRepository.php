<?php
/**
 * Created by PhpStorm.
 * User: manowartop
 * Date: 07.05.18
 * Time: 13:54
 */

namespace App\Components\Settings\Repositories;

use App\Components\Settings\Models\Setting;

/**
 * Class SettingsRepository
 * @package App\Components\Settings\Repositories
 */
class SettingsRepository
{
    /**
     * Get setting or create new
     *
     * @param null|integer $id
     * @return Setting|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model
     */
    public function getSetting($id = null)
    {
        return Setting::query()->findOrNew($id);
    }

    /**
     * Create new setting
     *
     * @param array $attributes
     * @return bool
     */
    public function create($attributes)
    {
        $setting = $this->getSetting(null);
        $setting->fill($attributes);

        return $setting->save();
    }

    /**
     * Update setting
     *
     * @param integer $id
     * @param array $attributes
     * @return bool
     */
    public function update($id, $attributes)
    {
        $setting = $this->getSetting($id);
        $setting->fill($attributes);

        return $setting->save();
    }

    /**
     * Delete setting
     *
     * @param integer $id
     * @return bool|null
     * @throws \Exception
     */
    public function delete($id)
    {
        return $setting = $this->getSetting($id)->delete();
    }
}