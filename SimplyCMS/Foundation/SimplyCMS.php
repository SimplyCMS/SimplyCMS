<?php

namespace SimplyCMS\Foundation;

use Illuminate\Foundation\Application;

/**
 * Class SimplyCMS
 * @package SimplyCMS\Foundation
 */
class SimplyCMS extends Application
{
    /**
     * The base path for plugins.
     *
     * @var string
     */
    protected $pluginsPath;
    /**
     * The base path for themes.
     *
     * @var string
     */
    protected $themesPath;

    public function getPluginsPath(): string
    {
        return $this->pluginsPath;
    }

    public function getThemesPath(): string
    {
        return $this->themesPath;
    }
}
