<?php
/**
 * Created by PhpStorm.
 * User: manowartop
 * Date: 07.05.18
 * Time: 16:47
 */

namespace App\Components\settings\Facades;

use App\Components\settings\Contracts\SettingsInterface;
use Illuminate\Support\Facades\Facade;

/**
 * Class Settings
 * @package App\Components\settings\Facades
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