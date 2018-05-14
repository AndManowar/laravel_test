<?php
/**
 * Created by PhpStorm.
 * User: manowartop
 * Date: 12.05.2018
 * Time: 17:07
 */

namespace App\Components\FileUploader\Providers;

use App\Components\FileUploader\Contracts\FileUploadInterface;
use App\Components\FileUploader\FileUploader;
use Illuminate\Support\ServiceProvider;

/**
 * Class FileServiceProvider
 * @package App\Components\FileUploader\Providers
 */
class FileServiceProvider extends ServiceProvider
{
    /**
     *
     */
    public function boot()
    {

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(FileUploadInterface::class, FileUploader::class);
    }

    /**
     * @return array
     */
    public function provides()
    {
        return [FileUploadInterface::class];
    }
}