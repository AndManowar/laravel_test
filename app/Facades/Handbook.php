<?php
/**
 * Created by PhpStorm.
 * User: manowartop
 * Date: 02.05.18
 * Time: 12:03
 */

namespace App\Facades;

use App\Services\handbook\Contracts\HandbookInterface;
use Illuminate\Support\Facades\Facade;

/**
 * Class Handbook
 * @package App\Facades
 */
class Handbook extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return HandbookInterface::class;
    }
}