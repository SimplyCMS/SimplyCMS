<?php

namespace Tests\Unit\modules\System;

use System\Classes\ThemeManager;
use PHPUnit\Framework\TestCase;
use \ReflectionClass;

class ThemeManagerTest extends TestCase
{
    /**
     * @test
     */
    public function fetchThemes()
    {
        $themeManager = new ThemeManager();
        $themeManager->fetchThemes();
    }
}
