<?php
/**
 * Created by PhpStorm.
 * User: manowartop
 * Date: 02.05.18
 * Time: 12:06
 */

namespace App\Components\handbook\Providers;

use App\Components\handbook\Validators\DataValidator;
use App\Components\handbook\Contracts\HandbookInterface;
use App\Components\handbook\Handbook;
use Illuminate\Support\ServiceProvider;
use Validator;

/**
 * Class HandbookServiceProvider
 * @package App\Components\handbook\Providers
 */
class HandbookServiceProvider extends ServiceProvider
{
    /**
     *
     */
    public function boot()
    {
        Validator::resolver(
            function ( $translator, $data, $rules, $messages, $customAttributes ) {
                return new DataValidator( $translator, $data, $rules, $messages, $customAttributes );
            }
        );
    }

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