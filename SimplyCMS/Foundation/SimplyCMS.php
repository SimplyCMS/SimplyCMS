<?php

namespace SimplyCMS\Foundation;

use Illuminate\Foundation\Application;

/**
 * Class SimplyCMS
 * @package SimplyCMS\Foundation
 */
class SimplyCMS extends Application
{
    public function getPluginsPath(): string
    {
        return null; //TODO: Fix this
    }

    public function getThemesPath(): string
    {
        return null; //TODO: Fix this
    }
}
