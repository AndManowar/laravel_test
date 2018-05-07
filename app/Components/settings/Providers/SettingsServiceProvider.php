<?php
/**
 * Created by PhpStorm.
 * User: manowartop
 * Date: 07.05.18
 * Time: 16:52
 */

namespace App\Components\settings\Providers;

use App\Components\settings\Contracts\SettingsInterface;
use App\Components\settings\SettingsMethods;
use Illuminate\Support\ServiceProvider;

/**
 * Class SettingsServiceProvider
 * @package App\Components\settings\Providers
 */
class SettingsServiceProvider extends ServiceProvider
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
        $this->app->singleton(SettingsInterface::class, SettingsMethods::class);
    }

    /**
     * @return array
     */
    public function provides()
    {
        return [SettingsInterface::class];
    }
}