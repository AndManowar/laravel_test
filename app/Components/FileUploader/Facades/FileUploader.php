<?php
/**
 * Created by PhpStorm.
 * User: manowartop
 * Date: 12.05.2018
 * Time: 17:09
 */

namespace App\Components\FileUploader\Facades;

use App\Components\FileUploader\Contracts\FileUploadInterface;
use Illuminate\Support\Facades\Facade;

/**
 * Class FileUploader
 * @package App\Components\FileUploader\Facades
 */
class FileUploader extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return FileUploadInterface::class;
    }
}