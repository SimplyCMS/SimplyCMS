<?php


namespace SimplyCMS\Parse\Twig;

/**
 * Class FileFinder
 *
 * @package SimplyCMS\Parse\Twig
 */
class FileFinder
{
    public string $active_theme;
    /**
     * FileFinder constructor.
     */
    public function __construct()
    {
        $this->active_theme = 'example-theme';
    }
}
