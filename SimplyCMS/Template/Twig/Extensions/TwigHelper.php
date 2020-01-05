<?php


namespace SimplyCMS\Template\Twig\Extensions;


use Frontend\Classes\FrontendController;
use Twig\Extension\AbstractExtension;
use Twig\Extension\ExtensionInterface;

class TwigHelper extends AbstractExtension implements ExtensionInterface
{
    protected $controller;
    public function __construct(FrontendController $controller = null)
    {
     $this->controller = $controller;
    }

    public function pageFunction(){
        echo $this->controller->renderPage();
    }
}
