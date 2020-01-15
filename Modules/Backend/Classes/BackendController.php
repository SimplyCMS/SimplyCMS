<?php

namespace Backend\Classes;

use SimplyCMS\Parse\Twig\Extensions\ContentTokenParser;
use SimplyCMS\Parse\Twig\Extensions\PageTokenParser;
use SimplyCMS\Parse\Twig\Extensions\TwigHelper;
use SimplyCMS\Parse\Twig\Twig;
use System\Classes\Controller;
use System\Classes\SettingsRepository;
use Twig\Environment;

/**
 * Class BackendController
 *
 * @package Backend\Classes
 */
class BackendController extends Controller
{
    /**
     * @var Twig
     */
    protected Twig $twig;
    protected string $pageContents;

    public function __construct(BackendRouter $router)
    {
        die(var_dump((new SettingsRepository())->loadItems()));

        $this->router = $router;
        $themePath = base_path('Modules/Backend/Views');
        $this->twig = new Twig($themePath);
    }

    public function handle($uri = null)
    {
        $this->bootTwig();
        if (is_null($uri)) {
            echo $this->twig->render('layouts/layout.twig');
        } else {
            echo $uri;
        }
    }

    /**
     * Boot any twig extensions for the route
     *
     * @return void
     */
    private function bootTwig()
    {
        $this->twig->loadExtension(Twig::TWIG_TAG, ContentTokenParser::class);
        $this->twig->loadExtension(Twig::TWIG_TAG, PageTokenParser::class);
        $this->twig->loadExtension(
            Twig::TWIG_FILTER,
            new \Twig\TwigFilter('asset', function ($string) {
                return '/backend/assets/' . $string;
            })
        );
        $this->twig->getEnvironment()->addExtension(new TwigHelper($this));

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
