<?php
/**
 * Created by PhpStorm.
 * User: manowartop
 * Date: 07.05.18
 * Time: 16:48
 */

namespace App\Components\Settings\Contracts;

/**
 * Class SettingsInterface
 * @package App\Components\Settings\Contracts
 */
interface SettingsInterface
{
    /**
     * Get setting value by systemName
     *
     * @param string $systemName
     * @return mixed
     */
    public function getValue($systemName);
}