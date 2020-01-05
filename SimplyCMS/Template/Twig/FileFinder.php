<?php


namespace SimplyCMS\Template\Twig;

/**
 * Class FileFinder
 *
 * @package SimplyCMS\Template\Twig
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
