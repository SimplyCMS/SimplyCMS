<?php

namespace System\Classes;

use Illuminate\Filesystem\Filesystem;
use Symfony\Component\Yaml\Yaml;

class ThemeManager
{
    /**
     * @var array
     */
    protected array $themes = [];

    /**
     * @var string
     */
    protected string $themePath;

    /**
     * ThemeManager constructor.
     */
    public function __construct()
    {
        $this->themePath = config('cms.theme_path');
    }

    public function fetchAll()
    {
        $filesystem = new Filesystem();
        $directories = $filesystem->directories($this->themePath);

        foreach ($directories as $key => $directory) {
            $exploded = explode('/', $directory);
            $this->themes[count($this->themes)] = $exploded[count($exploded) - 1];
        }
    }

    /**
     * Delete a theme
     *
     * @param string $themeName The name of the theme to delete
     */
    public function delete(string $themeName)
    {

    }
}
