<?php

namespace Backend;

use Illuminate\Support\ServiceProvider;

/**
 * Class BackendServiceProvider
 *
 * @package Backend
 */
class BackendServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/routes.php');
    }

    public function register()
    {
    }
}
