<?php
/**
 * Created by PhpStorm.
 * User: manowartop
 * Date: 09.05.2018
 * Time: 13:40
 */

namespace App\Components\Rbac\Providers;

use App\Components\Rbac\Contracts\RbacInterface;
use App\Components\Rbac\Rbac;
use Illuminate\Support\ServiceProvider;

/**
 * Class RbacServiceProvider
 * @package App\Components\Rbac\Providers
 */
class RbacServiceProvider extends ServiceProvider
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
        $this->app->singleton(RbacInterface::class, Rbac::class);
    }

    /**
     * @return array
     */
    public function provides()
    {
        return [RbacInterface::class];
    }
}