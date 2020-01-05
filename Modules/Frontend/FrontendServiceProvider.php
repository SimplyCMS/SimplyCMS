<?php

namespace Frontend;

use Frontend\Classes\CMSRouter;
use Illuminate\Support\ServiceProvider;

/**
 * Class FrontendServiceProvider
 *
 * @package Frontend
 */
class FrontendServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/routes.php');
    }

    public function register()
    {
        $this->app->singleton(CMSRouter::class, function () {
            return new CMSRouter();
        });
    }
}
