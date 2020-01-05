<?php

namespace SimplyCMS\Template\Twig;

use Illuminate\Filesystem\Filesystem;
use SimplyCMS\Template\Twig\Extensions\TwigHelper;
use Symfony\Component\Yaml\Yaml;
use Twig\Environment as TwigEnvironment;
use Twig\Loader\ArrayLoader;

class Twig
{
    const TWIG_MACRO = 0;
    const TWIG_GLOBAL = 1;
    const TWIG_FUNCTION = 2;
    const TWIG_FILTER = 3;
    const TWIG_TAG = 4;
    const TWIG_TEST = 5;
    const TWIG_OPERATOR = 6;

    /**
     * @var TwigEnvironment The Twig environment object.
     */
    private $twig_environment;

    private $twig_loader;

    /**
     * Twig constructor.
     */
    public function __construct(string $template_directory)
    {
        $this->twig_loader = new ArrayLoader($this->loadDirectory($template_directory));
        $this->twig_environment = new TwigEnvironment($this->twig_loader, [
            'cache' => base_path('storage/framework/twig'),
        ]);
    }

    public function render(string $filename)
    {
        return $this->twig_environment->render($filename);
    }

    /**
     * Get the twig loader instance
     *
     * @return ArrayLoader
     */
    public function &getLoader()
    {
        return $this->twig_loader;
    }

    /**
     * Get the twig environment instance
     *
     * @return TwigEnvironment
     */
    public function &getEnvironment()
    {
        return $this->twig_environment;
    }

    public function loadExtension(int $type, $class)
    {
        switch ($type) {
            case self::TWIG_MACRO:
                break;
            case self::TWIG_GLOBAL:
                break;
            case self::TWIG_FUNCTION:
                break;
            case self::TWIG_FILTER:
                $this->twig_environment->addFilter($class);
                break;
            case self::TWIG_TAG:
                $this->twig_environment->addTokenParser(new $class);
                break;
            case self::TWIG_TEST:
                break;
            case self::TWIG_OPERATOR:
                break;
            default:
                break;
        }
    }

    public function loadDirectory(string $template_directory): array
    {
        $filesystem = new Filesystem();
        $pages = function ($files): array {
            $fileArray = [];
            foreach ($files as $file) {
                $exploded = explode('==', $file->getContents());
                $parsed = $exploded[1];
                $fileArray['pages/' . $file->getFilename()] = $parsed;
            }
            return $fileArray;
        };
        $layouts = function ($files): array {
            $fileArray = [];
            foreach ($files as $file) {
                //$exploded = explode('==', $file->getContents());
                //$parsed = $exploded[1];
                $fileArray['layouts/' . $file->getFilename()] = $file->getContents();
            }
            return $fileArray;
        };
        $partials = function ($files): array {
            $fileArray = [];
            foreach ($files as $file) {
                $exploded = explode('==', $file->getContents());
                $parsed = $exploded[1];
                $fileArray['partials/' . $file->getFilename()] = $parsed;
            }
            return $fileArray;
        };

        $templates = function (array $pages, array $layouts, array $partials): array {
            return array_merge($pages, $partials, $layouts);
        };

        return $templates(
            $pages($filesystem->files($template_directory . '/pages')),
            $layouts($filesystem->files($template_directory . '/layouts')),
            $partials($filesystem->files($template_directory . '/partials'))
        );
    }
}
