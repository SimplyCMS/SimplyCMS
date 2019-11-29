<?php

namespace Frontend;

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
    }
}
