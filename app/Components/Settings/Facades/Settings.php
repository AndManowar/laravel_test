<?php
/**
 * Created by PhpStorm.
 * User: manowartop
 * Date: 07.05.18
 * Time: 16:47
 */

namespace App\Components\Settings\Facades;

use App\Components\Settings\Contracts\SettingsInterface;
use Illuminate\Support\Facades\Facade;

/**
 * Class Settings
 * @package App\Components\Settings\Facades
 */
class Settings extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return SettingsInterface::class;
    }
}