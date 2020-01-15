<?php

namespace Frontend\Classes;

use Illuminate\Filesystem\Filesystem;
use SimplyCMS\Template\Twig\Extensions\ContentTokenParser;
use SimplyCMS\Template\Twig\Extensions\PageTokenParser;
use SimplyCMS\Template\Twig\Extensions\TwigHelper;
use SimplyCMS\Parse\Twig\Twig;
use Symfony\Component\Yaml\Yaml;

/**
 * Class FrontendController
 * @package Frontend\Classes
 */
class FrontendController
{
    /**
     *
     *
     * @var Twig
     */
    protected Twig $twig;

    /**
     * The router to manage routing for this route
     *
     * @var CMSRouter
     */
    protected CMSRouter $router;

    /**
     * The current layout for the route
     *
     * @var string $layout
     */
    protected $layout;

    /**
     * The contents of the page (after '==')
     *
     * @var string $pageContents
     */
    protected string $pageContents;

    /**
     * The settings for the current page (before '==')
     *
     * @var array
     */
    protected array $pageSettings;

    protected string $themePath;
    protected string $activeTheme;

    /**
     * FrontendController constructor.
     *
     * @param CMSRouter $router
     */
    public function __construct(CMSRouter $router)
    {
        $this->router = $router;
        $this->activeTheme = 'example-theme';
        $themePath = base_path('themes/' . $this->activeTheme);
        $this->twig = new Twig($themePath);
    }

    /**
     * Boot any twig extensions for the route
     *
     * @return void
     */
    private function bootTwig(): void
    {
        $this->twig->loadExtension(Twig::TWIG_TAG, ContentTokenParser::class);
        $this->twig->loadExtension(Twig::TWIG_TAG, PageTokenParser::class);
        $this->twig->loadExtension(
            Twig::TWIG_FILTER,
            new \Twig\TwigFilter('asset', function ($string) {
                return '/themes/' . $this->activeTheme . '/assets/' . $string;
            })
        );
        $this->twig->getEnvironment()->addExtension(new TwigHelper($this));

    }

    public function handle($url = '/')
    {
        $activeTheme = 'example-theme';
        $this->themePath = base_path('themes/' . $activeTheme);

        $filesystem = new Filesystem();
        $files = $filesystem->files($this->themePath . '/pages');

        $route_array = collect();

        foreach ($files as $file) {
            $exploded = explode('==', $file->getContents());
            $parsed = Yaml::parse($exploded[0]);
            $this->pageContents = $exploded[1];
            $route_array = $route_array->merge(collect([$parsed['url'] => [
                'page' => $file->getFilename(),
                'url' => $parsed['url'],
                'layout' => 'layouts/' . $parsed['layout'] . '.htm',
            ]]));
        }

        if ($url[0] !== '/') {
            $url = '/' . $url;
        }

        $pulledroute = $route_array->pull($url);

        $this->layout = file_get_contents($this->themePath . '/' . $pulledroute['layout']);

        //$this->twig->getEnvironment()->load($themePath . '/pages/' . $pulledroute['page']);


        //dd($this->twig->getEnvironment()->load($themePath . '/' . $pulledroute['layout']));

        $this->bootTwig();
        echo $this->twig->render($pulledroute['layout']);
    }

    /**
     * Render the page contents
     *
     * @return string
     */
    public function renderPage()
    {
        return $this->pageContents;
    }
}
