<?php
/**
 * Created by PhpStorm.
 * User: manowartop
 * Date: 02.05.18
 * Time: 12:06
 */

namespace App\Providers;

use App\Services\handbook\Contracts\HandbookInterface;
use App\Services\handbook\Handbook;
use Illuminate\Support\ServiceProvider;

class HandbookServiceProvider extends ServiceProvider
{
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(HandbookInterface::class, Handbook::class);
    }

    /**
     * @return array
     */
    public function provides()
    {
        return [HandbookInterface::class];
    }
}