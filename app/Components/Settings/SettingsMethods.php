<?php
/**
 * Created by PhpStorm.
 * User: manowartop
 * Date: 07.05.18
 * Time: 16:48
 */

namespace App\Components\Settings;

use App\Components\Settings\Contracts\SettingsInterface;
use App\Components\Settings\Models\Setting;

/**
 * Class SettingsMethods
 * @package App\Components\Settings
 */
class SettingsMethods implements SettingsInterface
{
    /**
     * Get setting value by systemName
     *
     * @param string $systemName
     * @return mixed
     */
    public function getValue($systemName)
    {
        return Setting::query()->where('systemName', $systemName)->first();
    }
}