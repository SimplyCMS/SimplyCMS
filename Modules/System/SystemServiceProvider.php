<?php

namespace System;

use Illuminate\Support\ServiceProvider;
use System\Classes\ThemeManager;
use System\Classes\PluginManager;

/**
 * Class SystemServiceProvider
 *
 * @package System
 */
class SystemServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__ . '/Database/Migrations');
    }

    public function register()
    {
        $this->app->singleton('simply.system.themeManager', function () {
            return new ThemeManager();
        });
        $this->app->singleton('simply.system.pluginManager', function () {
            return new PluginManager();
        });
    }
}
